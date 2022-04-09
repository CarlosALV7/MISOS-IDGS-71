@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box-open"></i> Ventas
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:20%">localidad</th>
                        <th style="width:20%">Calle</th>
                        <th style="width:10%">Número exterior</th>
                        <th style="width:10%">Código postal</th>
                        <th style="width:30%">Referencias</th>
                        <th style="width:10%">
                            <a class="btn btn-primary btn-sm" href="{!! route('direcciones.create') !!}" title="añadir direccion"><i class="fa fa-circle-plus"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($direcciones as $direccion)
                    <tr>
                        <td>{{ $direccion->localidad }}</td>
                        <td>{{ $direccion->calle }}</td>
                        <td>{{ $direccion->numero_exterior }}</td>
                        <td>{{ $direccion->codigo_postal }}</td>
                        <td>{{ $direccion->referencias }}</td>
                        <td>
                            @can('direcciones.update')
                            <a class="btn btn-secondary btn-sm" href="{!! route('direcciones.edit', $direccion->id) !!}" title="editar dirección"><i class="fa fa-edit"></i></a>
                            &nbsp;
                            @endcan
                            @can('citas.destroy')
                            <form class="d-inline" action="{!! route('direcciones.destroy', $direccion->id) !!}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="btn btn-danger btn-sm" type="submit" title="borrar direccion"><i class="fa fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function(e) {
    // Registrar manejador formularios de borrado
    $('form[class="d-inline"]').submit(function(e) {
        if (confirm('¿Realmente deseas eliminar el registro?\nLa operación será irreversible')) {
            return true;// Enviar sólo cuando se confirma borrado
        } else {
            e.preventDefault(); // prevenir acción predeterminada (submit)
        }
    })
})
</script>
@endsection