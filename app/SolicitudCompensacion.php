<?php

namespace Corponor;

use Illuminate\Database\Eloquent\Model;

class SolicitudCompensacion extends Model
{
    //
    protected $table = "solicitud_compensacion";

    protected $fillable = [
        'compensacion_numero',
        'compensacion_especie',
        'compensacion_lugar',
        'solicitud_id',

    ];
}
