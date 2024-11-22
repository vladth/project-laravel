<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
            'forma_pago' => 'required|max:50',
            'tipo_cambio' => 'required|in:NINGUNO,DÓLAR,PESO,EURO,BOLIVIANOS',
            'cantidad_moneda' => 'required|numeric',
            'cheque' => 'numeric|nullable',
            'glosa' => 'required|max:191',
            'razon_social' => 'required|max:191',
            'concepto' => 'required|max:191',
            'total_debe' => 'required',
            'total_haber' => 'required',

            'id_cuenta' => 'required',
            'debe' => 'required',
            'haber' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'forma_pago.required' => 'La forma de pago es obligatorio',
            'cantidad_moneda.required' => 'La cantidad de cambio es obligatorio'
        ];
    }
}
