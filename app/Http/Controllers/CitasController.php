<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cita;
use App\Models\User;
use JsValidator;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all();// select id, categoria, estatus from categorias
        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cita = new Cita;
        $users = User::select('id', 'name')->orderBy('name', 'asc')->pluck('name', 'id');
        $validator = JsValidator::make(Cita::reglasValidacion(), [], Cita::etiquetas(), '#formulario');
        return view('citas.form', compact('cita','users', 'validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->setValidator($request, Cita::reglasValidacion(), [])->validate();
        Cita::create($request->all());
        flash('Cita creada satisfactoriamente')->success();
        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        $validator = JsValidator::make(Cita::reglasValidacion(), [], Cita::etiquetas(), '#formulario');
        return view('citas.form', compact('cita', 'validator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $this->setValidator($request, Cita::reglasValidacion(), [])->validate();
        $cita->update($request->all());
        flash('Cita actualizada satisfactoriamente')->success();
        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        flash('Cita eliminada satisfactoriamente')->warning();
        return redirect()->route('citas.index');
    }

    protected function setValidator(Request $request, $validationRules, $replaceValidationRules = []) {
        return Validator::make($request->all(), array_merge($validationRules, $replaceValidationRules))
            ->setAttributeNames(Cita::etiquetas());
    }
}