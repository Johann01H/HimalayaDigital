<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permissions_roles extends Model
{
    protected $fillable = [
        'role_id',
        'permission_id'
    ];

}
