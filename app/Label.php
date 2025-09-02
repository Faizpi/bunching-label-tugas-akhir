<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
   public function operator() {
    return $this->belongsTo(\App\User::class, 'operator_id')->withDefault([
        'name' => '-',
    ]);
}
}

