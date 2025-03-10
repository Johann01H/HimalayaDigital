<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Trafico_tarea;
class Area extends Model
{
    protected $fillable =[
        'id',
        'nombre',
        'extencion_tel',
        'horas_consumidas',
        'estado',
    ];


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class);
    }

    public function requerimientos_ots(): HasMany
    {
        return $this->hasMany(Requerimientos_ots::class);
    }

    public function traficos_tareas(): HasMany
    {
        return $this->hasMany(Trafico_tarea::class);
    }
}
