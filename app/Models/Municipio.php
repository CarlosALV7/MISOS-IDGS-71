<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'estado_id'
        , 'municipio'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'estado_id' => 'required|integer|min:0'
            , 'municipio' => 'required|string|min:3|max:1000'
        ];
    }

    public static function etiquetas() {
        return [
            'estado_id' => 'estado'
            , 'municipio' => 'municipio'
        ];
    }
}
