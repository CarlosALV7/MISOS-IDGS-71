<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class municipioRequest extends FormRequest
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
            'estado_id' => 'required|integer|min:0'
            , 'municipio' => 'required|string|min:3|max:1000'
        ];
    }
}
