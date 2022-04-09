<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Producto;
use App\Models\Venta;
use JsValidator;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venta = new Venta;
        $users = User::select('id', 'name')->orderBy('name', 'asc')->pluck('name', 'id');
        $productos = Producto::select('id', 'producto')->orderBy('producto', 'asc')->pluck('producto', 'id');
        $validator = JsValidator::make(Venta::reglasValidacion(), [], Venta::etiquetas(), '#formulario');
        return view('ventas.form', compact('venta', 'users', 'productos', 'validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->setValidator($request, Venta::reglasValidacion(), [])->validate();
        Venta::create($request->all());
        flash('Venta añadida satisfactoriamente')->success();
        return redirect()->route('ventas.index');
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
        $venta = Venta::findOrFail($id);
        $users = User::select('id', 'name')->orderBy('name', 'asc')->pluck('name', 'id');
        $productos = Producto::select('id', 'producto')->orderBy('producto', 'asc')->pluck('producto', 'id');
        $validator = JsValidator::make(Venta::reglasValidacion(), [], Venta::etiquetas(), '#formulario');
        return view('ventas.form', compact('venta', 'users', 'productos', 'validator'));
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
        $venta = Venta::findOrFail($id);
        $this->setValidator($request, Venta::reglasValidacion(), [])->validate();
        $venta->update($request->all());
        flash('Venta actualizada satisfactoriamente')->success();
        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        flash('Venta eliminada satisfactoriamente')->warning();
        return redirect()->route('ventas.index');
    }
    protected function setValidator(Request $request, $validationRules, $replaceValidationRules = []) {
        return Validator::make($request->all(), array_merge($validationRules, $replaceValidationRules))
            ->setAttributeNames(Venta::etiquetas());
    }
}
