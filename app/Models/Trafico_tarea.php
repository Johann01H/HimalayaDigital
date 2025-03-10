<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trafico_tarea extends Model
{
    protected $table = 'trafico_tareas';

    protected $fillable = [
        'id',
        'nombre_tarea',
        'fecha_entrega_estimada',
        'descripcion',
        'enlaces_externos',
        'tiempo_estimado',
        'tiempo_real',
        'fecha_entrega_cliente',
        'estados_id',
        'areas_id',
        'usuarios_id',
        'ots_id',
        'roles_id',
        'created_at',
        'updated_at',
    ];

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class,'estados_id');
    }


    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class,'areas_id');
    }


    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function ots(): BelongsTo
    {
        return $this->belongsTo(Ots::class,'ots_id');
    }
}
