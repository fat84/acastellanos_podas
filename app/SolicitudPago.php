<?php

namespace Corponor;

use Illuminate\Database\Eloquent\Model;

class SolicitudPago extends Model
{
    //
    protected $table = "solicitud_pago";

    protected $fillable = [
        'solicitud_id',
        'user_id',
        'ruta'
    ];
}
