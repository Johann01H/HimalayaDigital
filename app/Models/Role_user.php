<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role_user extends Model
{
    protected $table = 'role_user';

    protected $fillable = [
        'id',
        'user_id',
        'role_id',
        'created_at',
        'updated_at'
    ];


}
