<?php

namespace App\Exports;

use App\Label;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LabelExport implements FromCollection, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;
    protected $rowNumber = 0;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }

    public function collection()
    {
        $query = Label::select(
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
            'labels.direction',
            'labels.visual',
            'labels.remark',
            'labels.bobin_no',
            'users.name as operator_name',
            'labels.created_at'
        )
            ->leftJoin('users', 'labels.operator_id', '=', 'users.id')
            ->orderBy('labels.id', 'desc');


        if ($this->startDate && $this->endDate) {
            $query->whereBetween('labels.shift_date', [$this->startDate, $this->endDate]);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'ID',
            'Lot Number',
            'Formatted Lot Number',
            'Size',
            'Length',
            'Weight',
            'Shift Date',
            'Shift',
            'Machine Number',
            'Pitch',
            'Visual',
            'Remark',
            'Bobin No',
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
            "'" . $row->formated_lot_number,
            $row->type_size,
            $row->length,
            $row->weight,
            $row->shift_date,
            $row->shift,
            $row->machine_number,
            $row->pitch,
            $row->visual,
            $row->remark,
            $row->bobin_no,
            $row->operator_name,
            $row->created_at,
        ];
    }
}
