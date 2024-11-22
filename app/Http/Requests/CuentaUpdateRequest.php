<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaUpdateRequest extends FormRequest
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
            'tipo_plan_cuenta' => 'required|in:ACTIVO,PASIVO,PATRIMONIO',
            'cuenta' => 'required|numeric|unique:cuentas,cuenta,'.$this->id_cuenta,
            'tipo_cuenta' => 'required|max:190' 
        ];
    }

    public function messages()
    {
        return [
            'tipo_cuenta.required' => 'El Nombre de Cuenta es obligatorio',
        ];
    }

}
