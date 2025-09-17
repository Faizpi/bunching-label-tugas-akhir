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
                'labels.id',
                'labels.lot_number',
                'labels.formated_lot_number',
                'labels.type_size',
                'labels.length',
                'labels.extra_length',
                'labels.weight',
                'labels.extra_weight',
                'labels.shift_date',
                'labels.shift',
                'labels.machine_number',
                'labels.pitch',
                'labels.visual',
                'labels.bobin_no',
                'labels.remark',
                'users.name as operator_name',
                'labels.created_at'
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
            'ID',
            'Lot Number',
            'Formatted Lot Number',
            'Size',
            'Length (m)',
            'Length Total (m)',
            'Extra Length (m)',   
            'Weight (kg)',
            'Extra Weight (kg)',
            'Shift Date',
            'Shift',
            'Machine Number',
            'Pitch (mm)',
            'Visual',
            'QC Test',
            'Remark',
            'Operator Name',
            'Created At'
        ];
    }

    public function map($row): array
    {
        $this->rowNumber++;

        // Parsing length
        $lengthTotal = null;
        if (!empty($row->length)) {
            // contoh format: "2 x 1800" atau "2x1800"
            $parts = preg_split('/x/i', str_replace(' ', '', $row->length));
            if (count($parts) == 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                $lengthTotal = $parts[0] * $parts[1];
            }
        }

        return [
            $this->rowNumber,
            $row->id,
            "'" . $row->lot_number,
            "" . $row->formated_lot_number,
            $row->type_size,
            $row->length,
            $lengthTotal,
            $row->extra_length,
            $row->weight,
            $row->extra_weight,
            Date::PHPToExcel(Carbon::parse($row->shift_date)),
            $row->shift,
            $row->machine_number,
            $row->pitch,
            $row->visual,
            $row->bobin_no,
            $row->remark,
            $row->operator_name,
            Date::PHPToExcel(Carbon::parse($row->created_at))
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_NUMBER_00, 
            'H' => NumberFormat::FORMAT_NUMBER_00,
            'I' => NumberFormat::FORMAT_NUMBER_00,
            'J' => NumberFormat::FORMAT_NUMBER_00,
            'K' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'L' => NumberFormat::FORMAT_NUMBER,
            'N' => NumberFormat::FORMAT_NUMBER_00,
            'S' => NumberFormat::FORMAT_DATE_DDMMYYYY . ' hh:mm', 
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Hitung jumlah baris terakhir
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $range = "A1:" . $highestColumn . $highestRow;

        // Tambahkan border di seluruh tabel
        $sheet->getStyle($range)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Styling header
        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }
}
