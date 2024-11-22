<?php

namespace App\Http\Requests; 

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:100|unique:users,nombre,'.$this->id_usuario,
            'tipo_documento' => 'required|in:NIT,CI',
            'num_documento' => 'required|max:100|unique:users,num_documento,'.$this->id_usuario,
            'expedito' => 'required|in:LA PAZ,COCHABAMBA,CHUQUISACA,BENI,ORURO,PANDO,POTOSI,SANTA CRUZ,TARIJA', 
            'direccion' => 'required|max:70',
            'telefono' => 'required|numeric',
            'email' => 'required|max:100|unique:users,email,'.$this->id_usuario,
            'usuario' => 'required|max:100|unique:users,usuario,'.$this->id_usuario,
            'password' => 'required',
            'id_rol' => 'required|in:1,2,3,4,2323'
        ];
    }

    public function messages()
    {
        return [
            'tipo_documento.required' => 'El tipo de documento es obligatorio',
            'num_documento.required' => 'El número de documento es obligatorio',
            'num_documento.numeric' => 'Solo puede ser números', 
            'email.required' => 'El correo es obligatorio',
            'id_rol.required' => 'Es obligatorio el rol',
            'password.required' => 'La contraseña es obligatorio'
        ];
    }
}
