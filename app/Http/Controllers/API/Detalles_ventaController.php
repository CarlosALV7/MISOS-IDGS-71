<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Detalle_ventaResource;
use App\Models\Detalles_venta;
use App\Http\Controllers\ApiController;

class Detalles_ventaController extends ApiController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Detalle_ventaResource::collection(Detalles_venta::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Detalles_venta::reglasValidacion());
        $detalle_venta = Detalles_venta::create($request->all());
        return new Detalle_ventaResource($detalle_venta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new Detalle_ventaResource(Detalles_venta::findOrFail($id));
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
        $request->validate(Detalles_venta::reglasValidacion());
        $detalle_venta = Detalles_venta::findOrFail($id);
        $detalle_venta->update($request->all());
        return new Detalle_ventaResource($detalle_venta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
