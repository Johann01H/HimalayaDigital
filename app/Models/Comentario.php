<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comentario extends Model
{
    protected $fillable = [
        'id',
        'comentarios',
        'usuarios_comentarios_id',
        'tareas_id',
        'estados_id',
        'requerimientos_clientes_id'
    ];

    public function users(): BelongsTo
    {
        return $this -> belongsTo(User::class,'usuarios_comentarios_id');
    }

    public function tareas(): BelongsTo
    {
        return $this -> belongsTo(Tarea::class,'tareas_id');
    }

    public function estados(): BelongsTo
    {
        return $this -> belongsTo(Estado::class,'estados_id');
    }

    public function requerimiento_clientes(): BelongsTo
    {
        return $this -> belongsTo(Requerimientos_clientes::class,'requerimientos_clientes_id');
    }

    public function historicos_tareas(): HasMany
    {
        return $this->hasMany(historico_tareas::class);
    }
}
