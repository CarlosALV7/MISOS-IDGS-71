<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_venta extends Model
{
    protected $table = 'detalles_venta';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'producto_id'
        , 'costo_unitario'
        , 'precio_unitario'
        , 'cantidad'
    ];
    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'producto_id' => 'required|integer|min:0'
            , 'costo_unitario' => 'required|numeric|min:0|max:2000'
            , 'precio_unitario' => 'required|numeric|min:0|max:3000'
            , 'cantidad' => 'required|numeric|min:0|max:10000'
        ];
}
public static function etiquetas() {
    return [
        'producto_id' => 'producto'
        , 'costo_unitario' => 'costo unitario'
        , 'precio_unitario' => 'precio unitario'
        , 'cantidad' => 'cantidad'
    ];
}
}
