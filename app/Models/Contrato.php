<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contrato extends Model
{
    protected $table = "contratos";

    protected $fillable = [

        'id',
        'nombre',
        'descripcion',
        'cliente_id',

    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

}
