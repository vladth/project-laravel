<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComprasRequest extends FormRequest
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
            'tipo_identificacion' => 'required|in:FACTURA,RECIBO',
            'id_proveedor' => 'required|numeric',
            'total_pagar' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'tipo_identificacion.required' => 'Debe seleccionar FACTURA o RECIBO',
            'id_proveedor.required' => 'El nombre del proveedor es obligatorio',
            'id_proveedor.numeric' => 'El nombre del proveedor es obligatorio'
        ];
    }
}
