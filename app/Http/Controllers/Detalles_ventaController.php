<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Producto;
use App\Models\Detalles_venta;
use JsValidator;

class Detalles_ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles_venta = Detalles_venta::all();
        return view('detalles_venta.index', compact('detalles_venta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalle_venta = new Detalles_venta;
        // enviamos listado de categorías posibles
        $productos = Producto::select('id', 'producto')->orderBy('producto', 'asc')->pluck('producto', 'id');
        $validator = JsValidator::make(Detalles_venta::reglasValidacion(), [], Detalles_venta::etiquetas(), '#formulario');
        return view('detalles_venta.form', compact('detalle_venta', 'productos', 'validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->setValidator($request, Detalles_venta::reglasValidacion(), [])->validate();
        Detalles_venta::create($request->all());
        flash('Agreado satisfactoriamente')->success();
        return redirect()->route('detalles_venta.index');
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
        $detalle_venta = Detalles_venta::findOrFail($id);
        // enviamos listado de categorías posibles
        $productos = Producto::select('id', 'producto')->orderBy('producto', 'asc')->pluck('producto', 'id');
        $validator = JsValidator::make(Detalles_venta::reglasValidacion(), [], Detalles_venta::etiquetas(), '#formulario');
        return view('detalles_venta.form', compact('detalle_venta', 'productos', 'validator'));
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
        $detalle_venta = Detalles_venta::findOrFail($id);
        $this->setValidator($request, Detalles_venta::reglasValidacion(), [])->validate();
        $detalle_venta->update($request->all());
        flash('Actualizado satisfactoriamente')->success();
        return redirect()->route('detalles_venta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle_venta = Detalles_venta::findOrFail($id);
        $detalle_venta->delete();
        flash('Eliminado satisfactoriamente')->warning();
        return redirect()->route('detalles_venta.index');
    }

    protected function setValidator(Request $request, $validationRules, $replaceValidationRules = []) {
        return Validator::make($request->all(), array_merge($validationRules, $replaceValidationRules))
            ->setAttributeNames(Detalles_venta::etiquetas());
    }
}
