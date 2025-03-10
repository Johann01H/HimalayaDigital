<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historico_tareas extends Model
{
    protected $fillable = [
        'tiempo_estimado',
        'tiempo_real',
        'comentarios_id',
        'tareas_id',
        'estados_id',
        'fecha_entrega_area',
        'fecha_entrega_cuentas',
    ];

    public function comentarios():BelongsTo
    {
        return $this->belongsTo(Comentario::class,'comentarios_id');
    }
    public function tareas():BelongsTo
    {
        return $this->belongsTo(Tarea::class,'comentarios_id');
    }
    public function estados():BelongsTo
    {
        return $this->belongsTo(Estado::class,'estados_id');
    }
}
