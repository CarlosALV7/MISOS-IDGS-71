@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box-open"></i> Direcciones
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:25%">Producto</th>
                        <th style="width:25%">Fecha</th>
                        <th style="width:25%">Total</th>
                        <th style="width:25%"><a class="btn btn-primary btn-sm" href="{!! route('ventas.create') !!}" title="agregar venta"><i class="fa fa-circle-plus"></i></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->producto_id }}</td>
                        <td>{{ $venta->fecha }}</td>
                        <td>{{ $venta->total }}</td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{!! route('ventas.edit', $venta->id) !!}" title="editar venta"><i class="fa fa-edit"></i></a>
                            &nbsp;
                            <form class="d-inline" action="{!! route('ventas.destroy', $venta->id) !!}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="btn btn-danger btn-sm" type="submit" title="borrar venta"><i class="fa fa-trash"></i></button>
                            </form>
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