<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncrementNew extends Model
{
    protected $table = 'increments_new'; // tabel yang kita buat di migration
    protected $fillable = ['machine_number', 'shift_date', 'last_number'];
}

