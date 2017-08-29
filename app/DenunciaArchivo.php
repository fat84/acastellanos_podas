<?php

namespace Corponor;

use Illuminate\Database\Eloquent\Model;

class DenunciaArchivo extends Model
{
    //
    protected $table = 'denuncia_archivos';

    protected $fillable = ['denuncia_id','nombre', 'ruta'];

    public function Solicitud (){
        return $this->belongsTo('Corponor\Denuncia', 'denuncia_id', 'id');
    }

}
