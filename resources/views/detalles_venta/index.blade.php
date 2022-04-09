@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box-open"></i> Detalles venta
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:20%">Producto</th>
                        <th style="width:20%">Costo unitario</th>
                        <th style="width:20%">Precio unitario</th>
                        <th style="width:20%">Cantidad</th>
                        <th style="width:20%"><a class="btn btn-primary btn-sm" href="{!! route('detalles_venta.create') !!}" title="crear detalle"><i class="fa fa-circle-plus"></i></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles_venta as $detalle_venta)
                    <tr>
                        <td>{{ $detalle_venta->producto_id }}</td>
                        <td>{{ $detalle_venta->costo_unitario }}</td>
                        <td>{{ $detalle_venta->precio_unitario }}</td>
                        <td>{{ $detalle_venta->cantidad }}</td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{!! route('detalles_venta.edit', $detalle_venta->id) !!}" title="editar venta"><i class="fa fa-edit"></i></a>
                            &nbsp;
                            <form class="d-inline" action="{!! route('detalles_venta.destroy', $detalle_venta->id) !!}" method="POST">
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