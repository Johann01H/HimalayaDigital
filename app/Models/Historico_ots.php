<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Historico_ots extends Model
{
    protected $table = "historico_ots";

    protected $fillable = [

        'id',
        'nombre',
        'referencia',
        'valor',
        'fee',
        'horas_totales',
        'horas_disponibles',
        'total_horas_extras',
        'observaciones',
        'clientes_id',
        'users_id',
        'estados_id'

    ];

    public function roles():BelongsTo
    {
        return $this->belongsTo(Role::class,'id_roles');
    }

}
