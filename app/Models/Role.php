<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $table = 'roles';

    protected $fillable = [

        'id',
        'nombre',
        'display_name',
        'descripcion',
        'created_at',
        'updated_at'

    ];

    public function estadosRoles():BelongsToMany
    {
        return $this->belongsToMany(Estado::class,'Estado_x_roles','role_id','estado_id');
    }

    public function PermissionsRoles():BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'permissions_roles','role_id','permission_id');
    }

    public function roleUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'Role_user','role_id','user_id');
    }

    public function user(): HasMany
    {
        return $this->HasMany(User::class);
    }
}
