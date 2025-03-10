<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $fillable = [
        'id',
        'type',
        'notifiable_id',
        'notifiable_type ',
        'data',
        'read_at',
        'created_at',
        'updated_at'
    ];

}
