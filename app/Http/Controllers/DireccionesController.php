<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Direccion;
use App\Models\User;
use App\Models\Estado;
use App\Models\Municipio;
use JsValidator;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = Direccion::all();
        return view('direcciones.index', compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direccion = new Direccion;
        $users = User::select('id', 'name')->orderBy('name', 'asc')->pluck('name', 'id');
        $estados = Estado::select('id', 'estado')->orderBy('estado', 'asc')->pluck('estado', 'id');
        $municipios = Municipio::select('id', 'municipio')->orderBy('municipio', 'asc')->pluck('municipio', 'id');
        $validator = JsValidator::make(Direccion::reglasValidacion(), [], Direccion::etiquetas(), '#formulario');
        return view('direcciones.form', compact('direccion', 'users', 'estados', 'municipios', 'validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->setValidator($request, Direccion::reglasValidacion(), [])->validate();
        Direccion::create($request->all());
        flash('Dirección añadida satisfactoriamente')->success();
        return redirect()->route('direcciones.index');
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
        $direccion = Direccion::findOrFail($id);
        // enviamos listado de categorías posibles
        $users = User::select('id', 'name')->orderBy('name', 'asc')->pluck('name', 'id');
        $estados = Estado::select('id', 'estado')->orderBy('estado', 'asc')->pluck('estado', 'id');
        $municipios = Municipio::select('id', 'municipio')->orderBy('municipio', 'asc')->pluck('municipio', 'id');
        $validator = JsValidator::make(Direccion::reglasValidacion(), [], Direccion::etiquetas(), '#formulario');
        return view('direcciones.form', compact('direccion', 'estados', 'municipios', 'users', 'validator'));
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
        $direccion = Direccion::findOrFail($id);
        $this->setValidator($request, Direccion::reglasValidacion(), [])->validate();
        $direccion->update($request->all());
        flash('Direccion actualizada satisfactoriamente')->success();
        return redirect()->route('direcciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccion = Direccion::findOrFail($id);
        $direccion->delete();
        flash('Direccion eliminada satisfactoriamente')->warning();
        return redirect()->route('direcciones.index');
    }
    protected function setValidator(Request $request, $validationRules, $replaceValidationRules = []) {
        return Validator::make($request->all(), array_merge($validationRules, $replaceValidationRules))
            ->setAttributeNames(Direccion::etiquetas());
    }
}
