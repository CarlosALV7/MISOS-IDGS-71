<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'estado'
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
        return [
            'estado' => 'required|string|min:5|max:500'
        ];
    }
    
    public static function etiquetas() {
        return [
            'estado' => 'estado'
        ];
    }

}
