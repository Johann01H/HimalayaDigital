<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'nit',
        'users_id',
        'email',
        'telefono',
        'nombre_contacto',
        'estado',
        'razon_social',
    ];

    public function user_customer():BelongsTo
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function ots(): hasMany
    {
        return $this->hasMany(Ots::class);
    }

    public function requierimientos_clientes(): hasMany
    {
        return $this->hasMany(Requerimientos_clientes::class);
    }

    public function users(): hasMany
    {
        return $this->hasMany(Requerimientos_clientes::class);
    }

    public function historico_clientes(): hasMany
    {
        return $this->hasMany(Historico_clientes::class);
    }
}
