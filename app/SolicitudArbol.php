<?php

namespace Corponor;

use Illuminate\Database\Eloquent\Model;

class SolicitudArbol extends Model
{
    //
    protected $table = 'solicitud_arboles';

    protected $fillable = [
        'solicitud_id',
        'especie',
        'cantidad',
        'altura',
        'accion_realizar'
    ];

    public function Solicitud (){
        return $this->belongsTo('Corponor\Solicitud', 'solicitud_id', 'id');
    }
}
