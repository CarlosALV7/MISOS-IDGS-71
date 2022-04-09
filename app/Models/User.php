<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'sexo',
        'rol',
        'estatus',
        'email',
        'password',
        
    ];

    public static function reglasValidacion() {
        // https://laravel.com/docs/9.x/validation#available-validation-rules
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

    public static function etiquetas() {
        return [
        'name' => 'name',
        'primer_apellido' => 'primer_apellido',
        'segundo_apellido' => 'segundo_apellido',
        'fecha_nacimiento' => 'fecha_nacimiento',
        'sexo' => 'sexo',
        'rol' => 'rol',
        'estatus' => 'estatus',
        'email' => 'email',
        'password' => 'password'
        ];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
    public function registerClient(User $request){
        // Se crea el usuario con los datos del registro
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Le asignamos el rol de Cliente
        $user->assignRole('Cliente');
    }
}
