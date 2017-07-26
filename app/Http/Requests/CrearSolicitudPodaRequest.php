<?php

namespace Corponor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearSolicitudPodaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::guest())
            return false;
        if(\Auth::user())
            return true;
        else
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'tipo_solicitante'      => 'int|min:0|max:1|required',
            'razon_social'          => 'string|min:10|max:255|required',
            'no_identificacion'     => 'string|min:6|max:15|required',
            'calidad_solicitante'   => 'string|min:6|max:50|required',
            'direccion_correspondencia' => 'string|min:10|max:255|required',
            'ciudad_id'             => 'int|required',
            'telefono'              => 'string|required|min:7|max:20',
            'correo'                => 'email|required',
            'nombre_predio'         => 'string|nullable|max:255',
            'ubicacion'             => 'string|required|max:255',
            'x_cod'                 => 'numeric|required',
            'y_cod'                 => 'numeric|required',
            'direccion_predio'      => 'string|min:1|max:255|required',
            'barrio_predio'         => 'string|min:5|max:255|required',
            'vereda_predio'         => 'string|nullable|max:255',
            'corregimiento_predio'  => 'string|nullable|max:255',
            'ciudad_predio'         => 'int|required',
        ];
    }
}
