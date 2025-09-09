<?php

namespace App\Exports;

use App\Label;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class LabelExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $rowNumber = 0;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
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
                'labels.weight',
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
            'Weight (kg)',
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

        return [
            $this->rowNumber,
            $row->id,
            "'" . $row->lot_number,          
            "" . $row->formated_lot_number, 
            $row->type_size,
            $row->length,
            $row->weight,
            $row->shift_date,
            $row->shift,
            $row->machine_number,
            $row->pitch,
            $row->visual,
            $row->bobin_no,
            $row->remark,
            $row->operator_name,
            $row->created_at,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_TEXT,           // Lot Number
            'D' => NumberFormat::FORMAT_TEXT,           // Formatted Lot Number
            'F' => NumberFormat::FORMAT_NUMBER_00,      // Length (2 decimal)
            'G' => NumberFormat::FORMAT_NUMBER,         // Weight (integer)
            'H' => NumberFormat::FORMAT_DATE_YYYYMMDD,  // Shift Date
            'K' => NumberFormat::FORMAT_NUMBER_00,      // Pitch (2 decimal)
            'P' => NumberFormat::FORMAT_DATE_DATETIME,  // Created At
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
