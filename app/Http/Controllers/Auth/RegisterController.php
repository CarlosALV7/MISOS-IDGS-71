<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|min:2|max:50'
            , 'primer_apellido' => 'required|string|min:3|max:100'
            , 'segundo_apellido' => 'required|string|min:3|max:100'
            , 'fecha_nacimiento' => 'required|string|min:9|max:11'
            , 'email' => 'required|string|min:10|max:30'
            , 'password' => 'required|string|min:6|max:30'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
        'name' => $data['name'],
        'primer_apellido' => $data['primer_apellido'],
        'segundo_apellido' => $data['segundo_apellido'],
        'fecha_nacimiento' => $data['fecha_nacimiento'],
        'sexo' => $data['sexo'],
        'rol' => $data['rol'],
        'estatus' => $data['estatus'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        ]);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->primer_apellido = $request->primer_apellido;
        $user->segundo_apellido = $request->segundo_apellido;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->sexo = $request->sexo;
        $user->rol = $request->rol;
        $user->estatus = $request->estatus;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
    }

}