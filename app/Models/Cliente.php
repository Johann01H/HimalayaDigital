<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = [

        'id',
        'nombre',
        'logo_cliente',
        'sitio_web',
        'email',
        'mapa_cliente',
        'telefono',
        'telefono_referencia',
        'usuario_id',
        'estado',
        'deleted_at'

    ];

     /**
     * Tre el usuario que pertece al cliente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function usuario(): belongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id','id' );
    }


    /**
     * Obtiene todos los contratos para el cliente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function contratos():HasMany
    {
        return $this->hasMany(Contrato::class,'cliente_id','id');
    }


    /**
     * Obtiene todos los clientes para el usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function redes_sociales(): hasMany
    {
        return $this->hasMany(Red_social::class,'cliente_id','id');
    }



}
