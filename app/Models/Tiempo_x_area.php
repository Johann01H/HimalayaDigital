<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Area;
class Tiempo_x_area extends Model
{

    protected $table = "tiempo_x_area";
    protected $fillable = [
        'id',
        'tiempo_estimado_ot',
        'tiempo_real',
        'tiempo_extra',
        'ots_id',
        'areas_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function ots(): BelongsTo
    {
        return $this->belongsTo(Ots::class, 'id', 'ots_id');
    }

    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'id', 'areas_id');
    }


}
