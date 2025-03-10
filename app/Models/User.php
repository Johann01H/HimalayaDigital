<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    protected $fillable = [

        'id',
        'nombre',
        'apellido',
        'cargo',
        'telefono',
        'numero_referencia',
        'descripcion',
        'habilidades',
        'redes_sociales',
        'email',
        'direccion',
        'estado',
        'horas_disponibles',
        'horas_gastadas',
        'api_token',
        'password',
        'remember_token',
        'fecha_nacimiento',
        'img_perfil',
        'roles_id',
        'areas_id',
        'created_at',
        'updated_at',

    ];


    public function areas():BelongsTo
    {
        return $this->belongsTo(Area::class,'areas_id');
    }

    public function roles():BelongsTo
    {
        return $this->belongsTo(Role::class,'roles_id');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    public function historico_clientes(): HasMany
    {
        return $this->HasMany(Historico_clientes::class);
    }

    public function historico_ots(): HasMany
    {
        return $this->HasMany(Historico_ots::class);
    }

    public function ots(): HasMany
    {
        return $this->HasMany(Ots::class);
    }

    public function clientes():hasMany
    {
        return $this->hasMany(Cliente::class);
    }

    public function requerimientos_clientes(): HasMany
    {
        return $this->hasMany(Requerimientos_clientes::class);
    }

    public function role_user(): BelongsToMany
    {
        return $this->belongsToMany(Role_user::class);
    }

    public function tareas(): HasMany
    {
        return $this->HasMany(Tarea::class);
    }
}
