<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tarea extends Model
{
    protected $table = 'tareas';

    protected $fillable = [
        'id',
        'nombre_tarea',
        'fecha_entrega_area',
        'fecha_entrega_cuentas',
        'descripcion',
        'enlaces_externos',
        'tiempo_estimado',
        'tiempo_real',
        'tiempo_mapa_cliente',
        'recurrente',
        'fecha_inicio_recurrencia',
        'id_evento',
        'fecha_inicio_programa',
        'fecha_fin_programa',
        'fecha_tentativa_cliente',
        'fecha_entrega_cliente_real',
        'mostrar_cliente',
        'estados_id',
        'planeaciones_fases_id',
        'requerimientos_clientes_id',
        'areas_id',
        'users_id',
        'ots_id',
        'estados_id',
        'created_at',
        'updated_at',
        'deleted_at'

    ];
    public function estados():BelongsTo
    {
        return $this->belongsTo(Estado::class,'estados_id');
    }

    public function users():BelongsTo
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function areas():BelongsTo
    {
        return $this->belongsTo(Area::class,'areas_id');
    }
    public function ots():BelongsTo
    {
        return $this->belongsTo(Ots::class,'ots_id');
    }

    public function planeaciones_fases():BelongsTo
    {
        return $this->belongsTo(Planeacion_fases::class,'planeaciones_fases_id');
    }

    public function requerimientos_clientes():BelongsTo
    {
        return $this->belongsTo(Requerimientos_clientes::class,'requerimientos_clientes_id');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    public function historico_tareas(): HasMany
    {
        return $this->hasMany(Historico_tareas::class);
    }
}
