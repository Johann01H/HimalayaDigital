<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{

    protected $table = "permissions";

    protected $fillable = [
        'id',
        'nombre',
        'display_name',
        'descripcion',
        'created_at',
        'updated_at'
    ];

    public function Permissions_roles():BelongsToMany
    {
        return $this->belongsToMany(Permissions_roles::class);
    }
}
