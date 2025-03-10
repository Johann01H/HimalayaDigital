<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisa extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'tasa_conversion',
        'estado',
    ];
}
