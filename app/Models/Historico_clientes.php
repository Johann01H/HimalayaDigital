<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historico_clientes extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'nit',
        'email',
        'telefono',
        'nombre_contacto',
        'razon_social',
        'user_id',
        'clientes_id'
    ];

    public function  users():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function  clientes():BelongsTo
    {
        return $this->belongsTo(Cliente::class,'clientes_id');
    }


}
