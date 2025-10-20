<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    // kalau nama tabel bukan plural, bisa tambahin:
    // protected $table = 'labels';

    protected $fillable = [
        'lot_number',
        'formated_lot_number',
        'type_size',     
        'length',
        'weight',
        'shift_date',
        'shift',
        'machine_number',
        'pitch',
        'visual',
        'remark',
        'bobin_no',
        'operator_id',
        'extra_weight',   
        'extra_length',
    ];

    public function operator()
    {
        return $this->belongsTo(\App\User::class, 'operator_id')->withDefault([
            'name' => '-',
        ]);
    }
}
