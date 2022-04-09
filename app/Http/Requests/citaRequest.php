<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class citaRequest extends FormRequest
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
            ,'fecha' => 'required|string'
            ,'descripcion' => 'required|string|max:500|min:10'
            , 'estatus' => 'required|in:' . implode(',', self::opcionesEstatus())
        ];
    }
    public static function opcionesEstatus() {
        return [
            'asistio' => 'asistio'
            , 'no asistio' => 'no asistio'
        ];
    }
}
