<?php

namespace App\Http\Requests; 

use Illuminate\Foundation\Http\FormRequest;

class VentasRequest extends FormRequest
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
            'tipo_identificacion' => 'required|in:FACTURA',
            'id_cliente' => 'required|numeric',
            'total_pagar' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'tipo_identificacion.required' => 'Debe seleccionar la FACTURA',
            'id_cliente.required' => 'El nombre del cliente es obligatorio',
            'id_cliente.numeric' => 'El nombre del cliente es obligatorio'

        ];
    }
}
