<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Planeacion_tipos extends Model
{

    protected $table = "planeacion_tipos";

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'estados',
        'areas_id',
        'created_at',
        'updated_at'
    ];

    public function areas():BelongsTo
    {
        return $this->belongsTo(Area::class,'areas_id');
    }

    public function planeacion_tipos(): HasMany
    {
        return $this->hasMany(Planeacion_fases::class);
    }
}
