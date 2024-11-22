<?php

namespace App\Http\Requests; 

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        if ($request = 'imagen') {
            return [
                'imagen' => 'required|image|max:1024'
            ];
        }
        
    }

    public function messages()
    {
        return [
                'imagen.required' => 'La imagen es requerida',
                'imagen.image' => 'Formato no permitido, debe ser una imagen',
                'imagen.max' => 'El tamaño máximo de la imagen permitido es 1 MB'
            ];
    }

}
