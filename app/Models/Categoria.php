<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // protected $table = 'categorias';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'categoria'
        , 'estatus'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'categoria' => 'required|string|min:5|max:50'
            , 'estatus' => 'required|in:' . implode(',', self::opcionesEstatus())
        ];
    }
    
    public static function etiquetas() {
        return [
            'categoria' => 'categoría'
            , 'estatus' => 'estatus'
        ];
    }

    public static function opcionesEstatus() {
        return [
            'activa' => 'activa'
            , 'inactiva' => 'inactiva'
        ];
    }
}
