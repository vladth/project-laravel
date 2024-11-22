<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosUpdateRequest extends FormRequest
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
            'codigo' => 'required|max:50|unique:productos,codigo,'.$this->id_producto,
            'nombre' => 'required|max:100|unique:productos,nombre,'.$this->id_producto,
            'descripcion' => 'required|max:100',
            'precio_venta' => 'required|numeric',
            'descuento' => 'required|numeric'
        ];
    }

}
