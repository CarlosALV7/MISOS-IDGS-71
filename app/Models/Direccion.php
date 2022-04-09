<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'usuario_id'
        ,'estado_id'
        ,'municipio_id'
        , 'localidad'
        , 'calle'
        , 'numero_exterior'
        , 'codigo_postal'
        , 'referencias'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
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
    
    public static function etiquetas() {
        return [
            'usuario_id' => 'usuario'
            ,'estado_id' => 'estado'
            ,'municipio_id' => 'municipio'
            , 'localidad' => 'localidad'
            , 'calle' => 'calle'
            , 'numero_exterior' => 'numero exterior'
            , 'codigo_postal' => 'codigo postal'
            , 'referencias' => 'referencias'
        ];
    }

    public static function opcionesEstatus() {
        return [
    
        ];
    }
}