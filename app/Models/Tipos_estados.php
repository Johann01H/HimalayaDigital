<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipos_estados extends Model
{
    protected $table = 'tipos_estados';
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'created_at',
        'updated_at',
    ];



}
