<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'name' => 'required|string|min:10|max:50'
            , 'primer_apellido' => 'required|string|min:3|max:100'
            , 'segundo_apellido' => 'required|string|min:3|max:100'
            , 'fecha_nacimiento' => 'required|string|min:9|max:11'
            , 'sexo' => 'required|in:' . implode(',', self::opcionesSexo())
            , 'rol' => 'required|in:' . implode(',', self::opcionesRol())
            , 'estatus' => 'required|in:' . implode(',', self::opcionesEstatus())
            , 'email' => 'required|string|min:10|max:30'
            , 'password' => 'required|string|min:6|max:30'
        ];
    }
    public static function opcionesSexo() {
        return [
            'femenino' => 'femenino'
            , 'masculino' => 'masculino'
            , 'prefiero no decirlo' => 'prefiero no decirlo'
        ];
    }

    public static function opcionesRol() {
        return [
            'Administrador' => 'Administrador'
            , 'Cliente' => 'Cliente'
            , 'Proveedor' => 'Proveedor'
        ];
    }

    public static function opcionesEstatus() {
        return [
            'activo' => 'activo'
            , 'inactivo' => 'inactivo'
        ];
    }
}
