<?php

namespace Corponor;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $table = 'solicitudes';

    protected $fillable = ['tipo_solicitante'      ,
        'razon_social'          ,
        'no_identificacion'     ,
        'calidad_solicitante'   ,
        'direccion_correspondencia',
        'ciudad_id'             ,
        'telefono'              ,
        'correo'                ,
        'nombre_predio'         ,
        'ubicacion'             ,
        'x_cod'                 ,
        'y_cod'                 ,
        'direccion_predio'      ,
        'barrio_predio'         ,
        'vereda_predio'         ,
        'corregimiento_predio'  ,
        'ciudad_predio' ];


    public function SolicitudArbol(){
        return $this->hasMany('Corponor\SolicitudArbol','solicitud_id');
    }

    public function SolicitudArchivo(){
        return $this->hasMany('Corponor\SolicitudArchivo','solicitud_id');
    }
}
