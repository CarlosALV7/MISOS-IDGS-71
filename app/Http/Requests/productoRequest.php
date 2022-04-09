<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productoRequest extends FormRequest
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
            'categoria_id' => 'required|integer|min:0'
            , 'producto' => 'required|string|min:3|max:100'
            , 'costo_unitario' => 'required|numeric|min:0|max:2000'
            , 'precio_unitario' => 'required|numeric|min:0|max:3000'
            , 'existencias' => 'required|numeric|min:0|max:10000'
            , 'descripcion' => 'required|string|max:5000'
            , 'estatus' => 'required|in:' . implode(',', self::opcionesEstatus())
        ];
    }
    public static function opcionesEstatus() {
        return [
            'activo' => 'activo'
            , 'inactivo' => 'inactivo'
        ];
    }
}
