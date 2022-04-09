<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'usuario_id'
        ,'producto_id'
        ,'fecha'
        ,'total'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'usuario_id' => 'required|integer|min:0'
            ,'producto_id' => 'required|integer|min:0'
            ,'fecha' => 'required|string|min:0|max:30'
            ,'total' => 'required|numeric|min:20|max:100000'
        ];
}

public static function etiquetas() {
    return [
        'usuario_id' => 'usuario'
        ,'producto_id' => 'producto'
        ,'fecha' => 'fecha'
        ,'total' => 'total'
    ];
}

}
