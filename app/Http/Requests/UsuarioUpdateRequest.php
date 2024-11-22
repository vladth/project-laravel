<?php

namespace App\Http\Requests; 

use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
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
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:30'
        ];
    }

    public function messages()
    {
        return [
                'mypassword.required' => 'El campo es requerido',
                'password.required' => 'El campo es requerido',
                'password.confirmed' => 'Las contraseñas no coinciden, Asegúrese de que sean iguales.',
                'password.min' => 'El mínimo permitido son 6 caracteres',
                'password.max' => 'El máximo permitido son 30 caracteres'
            ];
    }
}
