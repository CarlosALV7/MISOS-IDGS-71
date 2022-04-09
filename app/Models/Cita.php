<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    // protected $table = 'citas';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'usuario_id'
        ,'fecha'
        ,'descripcion'
        , 'estatus'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'usuario_id' => 'required|integer|min:0'
            ,'fecha' => 'required|string'
            ,'descripcion' => 'required|string|max:500|min:10'
            , 'estatus' => 'required|in:' . implode(',', self::opcionesEstatus())
        ];
    }
    
    public static function etiquetas() {
        return [
        'usuario_id' => 'usuario_id'
            ,'fecha' => 'fecha'
            ,'descripcion' => 'descripcion'
            , 'estatus' => 'estatus'
        ];
    }

    public static function opcionesEstatus() {
        return [
            'asistio' => 'asistio'
            , 'no asistio' => 'no asistio'
        ];
    }
}