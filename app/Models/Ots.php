<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ots extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'referencia',
        'valor',
        'fee',
        'horas_totales',
        'total_horas_extra',
        'observaciones',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'users_id',
        'estados_id',
        'clientes_id',
        'created_at',
        'updated_at'

    ];

    public function users():BelongsTo
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function cliente():BelongsTo
    {
        return $this->belongsTo(Cliente::class,'clientes_id');
    }
    public function estados():BelongsTo
    {
        return $this->belongsTo(Estado::class,'estados_id');
    }
    public function requerimientos_clientes(): HasMany
    {
        return $this->HasMany(Requerimientos_clientes::class);
    }

    public function tareas(): HasMany
    {
        return $this->HasMany(Tarea::class);
    }
}
