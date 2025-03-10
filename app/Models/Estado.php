<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Estado extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'tipos_estados_id',
    ];

    public function tipoEstado(): BelongsTo
    {
        return $this->belongsTo(Tipos_estados::class, 'tipos_estados_id');
    }

    public function historicoTareas(): HasMany
    {
        return $this->hasMany(Historico_tareas::class);
    }

    public function historicoOts(): HasMany
    {
        return $this->hasMany(Historico_ots::class);
    }

    public function traficoTareas(): HasMany
    {
        return $this->hasMany(Trafico_tarea::class);
    }

    public function requerimientosClientes(): HasMany
    {
        return $this->hasMany(Requerimientos_clientes::class);
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'estado_x_roles', 'estados_id', 'roles_id');
    }

    public function tareas():HasMany
    {
        return $this->hasMany(Tarea::class);
    }


}
