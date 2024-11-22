<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nombre' => 'required|min:2|max:100|unique:clientes', 
            'tipo_documento' => 'required|in:NIT,CI', 
            'num_documento' => 'required|numeric|unique:clientes', 
            'expedito' => 'required|in:LA PAZ,COCHABAMBA,CHUQUISACA,BENI,ORURO,PANDO,POTOSI,SANTA CRUZ,TARIJA', 
            'direccion' => 'required', 
            'telefono' => 'required|numeric', 
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El Nombre completo es obligatorio',
            'nombre.min' => 'El nombre debe tener al menos 2 caracteres', 
            'nombre.max' => 'El nombre solo puede tener 100 caracteres',

            'tipo_documento.required' => 'El tipo de documento es obligatorio',

            'num_documento.required' => 'El número de documento es obligatorio',
            'num_documento.numeric' => 'Solo puede ser números', 

            'expedito.required' => 'El lugar de expedición es obligatorio',

            'direccion.required' => 'La dirección es obligatorio',

            'telefono.required' => 'El telefono es obligatorio',
            'telefono.numeric' => 'Solo puede ser números', 

            'email.required' => 'El correo es obligatorio'
        ];
    }
}
