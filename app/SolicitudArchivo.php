<?php

namespace Corponor;

use Illuminate\Database\Eloquent\Model;

class SolicitudArchivo extends Model
{
    //
    protected $table = 'solicitud_archivo';

    protected $fillable = ['solicitud_id', 'nombre', 'ruta' ];

    public function Solicitud (){
        return $this->belongsTo('Corponor\Solicitud', 'solicitud_id', 'id');
    }

}
