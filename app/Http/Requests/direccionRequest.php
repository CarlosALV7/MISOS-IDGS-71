<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class direccionRequest extends FormRequest
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
            'usuario_id' => 'required|integer|min:0'
            ,'estado_id' => 'required|integer|min:0'
            ,'municipio_id' => 'required|integer|min:0'
            , 'localidad' => 'required|string|min:3|max:2000'
            , 'calle' => 'required|string|min:0|max:2000'
            , 'numero_exterior' => 'required|numeric|min:0|max:3000'
            , 'codigo_postal' => 'required|numeric|min:0|max:1000000'
            , 'referencias' => 'required|string|max:5000'
        ];
    }
}
