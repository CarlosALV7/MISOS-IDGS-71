<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class detalles_ventaRequest extends FormRequest
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
            'producto_id' => 'required|integer|min:0'
            , 'costo_unitario' => 'required|numeric|min:0|max:2000'
            , 'precio_unitario' => 'required|numeric|min:0|max:3000'
            , 'cantidad' => 'required|numeric|min:0|max:10000'
        ];
    }
}
