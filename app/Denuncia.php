<?php

namespace Corponor;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    //
    protected $table = "denuncias";

    protected $fillable = ['user_id','ciudad_id','direccion','descripcion'];


    public function DenunciaArchivo(){
        return $this->hasMany('Corponor\DenunciaArchivo','denuncia_id', 'id');
    }

    public function Ciudad(){
        return $this->belongsTo('Corponor\Ciudad', 'ciudad_id', 'id');
    }
}
