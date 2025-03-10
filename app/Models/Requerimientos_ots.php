<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Requerimientos_ots extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'horas',
        'areas_id',
        'ots_id',
        'created_at',
        'updated_at',
    ];

    public function areas():belongsTo
    {
        return $this->belongsTo(Area::class, 'areas_id');
    }

    public function ots():belongsTo
    {
        return $this->belongsTo(Ots::class, 'areas_id');
    }


}
