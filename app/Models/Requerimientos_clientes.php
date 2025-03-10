<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requerimientos_clientes extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'estado',
        'archivos_adjuntos',
        'fecha_ideal_entrega',
        'estados_id',
        'clientes_id',
        'users_id',
        'ots_id',
        'created_at',
        'updated_at',
    ];

    public function estados() : BelongsTo
    {
        return $this->belongsTo(Estado::class,'estados_id');
    }

    public function users():BelongsTo
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function clientes():BelongsTo
    {
           
        return $this->belongsTo(Cliente::class,'clientes_id');
    }

    public function ots():BelongsTo
    {
        return $this->belongsTo(Ots::class,'ots_id');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
}
