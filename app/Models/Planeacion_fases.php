<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Planeacion_tipos;
class Planeacion_fases extends Model
{
    protected $table = "planeacion_fases";
    protected $fillable = [
        'id',
        'nombre',
        'planeaciones_tipos_id',
        'estado',
        'created_at',
        'updated_at'
    ];

    public function planeaciones_tipos(): BelongsTo
    {
        return $this->belongsTo(Planeacion_tipos::class, 'planeaciones_tipos_id');
    }

    public function tareas(): HasMany
    {
        return $this->HasMany(Tarea::class);
    }

}
