<?php

namespace App\Exports;

use App\Label;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class LabelExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $rowNumber = 0;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        $query = Label::query()
            ->select(
                'labels.lot_number',
                'labels.formated_lot_number',
                'labels.type_size',
                'labels.length',
                'labels.extra_length',
                'labels.weight',
                'labels.shift_date',
                'labels.shift',
                'labels.machine_number',
                'labels.pitch',
                'labels.visual',
                'labels.bobin_no',
                'labels.remark',
                'users.name as operator_name',
                'labels.created_at',
                'labels.print_count'
            )
            ->leftJoin('users', 'labels.operator_id', '=', 'users.id')
            ->orderBy('labels.id', 'desc');

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('labels.shift_date', [$this->startDate, $this->endDate]);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'No',
            'Lot Number',
            'Formatted Lot Number',
            'Type/Size',
            'Drum/Coil',          // angka pertama dari Length
            'Std Length (m)',     // angka kedua dari Length
            'Length (m)',         // string aslinya
            'Base Length (m)',    // hasil perkalian
            'Extra Length (m)',
            'Total Length (m)',   // base + extra
            'Weight (kg)',
            'Date',
            'Shift',
            'Machine Number',
            'Pitch (mm)',
            'Visual',
            'Remark',
            'Operator Name',
            'Print Count',
        ];
    }

    public function map($row): array
    {
        $this->rowNumber++;

        $drumCoil = null;
        $stdLength = null;
        $baseLength = null;

        if (!empty($row->length)) {
            // contoh format: "3 x 2000" atau "3x2000"
            $parts = preg_split('/x/i', str_replace(' ', '', $row->length));
            if (count($parts) == 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                $drumCoil = $parts[0];
                $stdLength = $parts[1];
                $baseLength = $drumCoil * $stdLength;
            }
        }

        // Total Length = hasil perkalian + extra_length
        $totalLength = ($baseLength ?? 0) + ($row->extra_length ?? 0);

        return [
            $this->rowNumber,
            "'" . $row->lot_number,
            "" . $row->formated_lot_number,
            $row->type_size,
            $drumCoil,
            $stdLength,
            $row->length,
            $baseLength,
            $row->extra_length,
            $totalLength,
            $row->weight,
            Date::PHPToExcel(Carbon::parse($row->shift_date)),
            $row->shift,
            $row->machine_number,
            $row->pitch,
            $row->visual,
            $row->remark,
            $row->operator_name,
            $row->print_count,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT,           // Lot Number
            'C' => NumberFormat::FORMAT_TEXT,           // Formatted Lot
            'D' => NumberFormat::FORMAT_TEXT,           // Type/Size
            'E' => NumberFormat::FORMAT_NUMBER,         // Drum/Coil
            'F' => NumberFormat::FORMAT_NUMBER_00,      // Std Length
            'G' => NumberFormat::FORMAT_TEXT,           // Length (asli)
            'H' => NumberFormat::FORMAT_NUMBER_00,      // Base Length
            'I' => NumberFormat::FORMAT_NUMBER_00,      // Extra Length
            'J' => NumberFormat::FORMAT_NUMBER_00,      // Total Length
            'K' => NumberFormat::FORMAT_NUMBER_00,      // Weight
            'L' => NumberFormat::FORMAT_DATE_DDMMYYYY,  // Date
            'M' => NumberFormat::FORMAT_NUMBER,         // Shift
            'O' => NumberFormat::FORMAT_NUMBER_00,      // Pitch
            'S' => NumberFormat::FORMAT_NUMBER,         // Print Count
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $range = "A1:" . $highestColumn . $highestRow;

        // Border di seluruh tabel
        $sheet->getStyle($range)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Header bold dan rata tengah
        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }
}
