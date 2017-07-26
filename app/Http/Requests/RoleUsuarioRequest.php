<?php

namespace Corponor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::guest()){
            return false;
        }
        else if(\Auth::user()-role == 'usuario'){
            return true;
        }else{
            return false;
        }
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
            'nombre' => 'required|string|min:5|max:100',
        ];
    }

}
