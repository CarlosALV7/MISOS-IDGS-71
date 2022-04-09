<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'categoria_id'
        , 'producto'
        , 'costo_unitario'
        , 'precio_unitario'
        , 'existencias'
        , 'descripcion'
        , 'estatus'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
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
    
    public static function etiquetas() {
        return [
            'categoria_id' => 'categoría'
            , 'producto' => 'producto'
            , 'costo_unitario' => 'costo unitario'
            , 'precio_unitario' => 'precio unitario'
            , 'existencias' => 'existencias'
            , 'descripcion' => 'descripción'
            , 'estatus' => 'estatus'
        ];
    }

    public static function opcionesEstatus() {
        return [
            'activo' => 'activo'
            , 'inactivo' => 'inactivo'
        ];
    }
}
