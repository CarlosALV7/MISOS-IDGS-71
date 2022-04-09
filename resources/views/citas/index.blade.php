@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box-open"></i> Citas
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:25%">Fecha</th>
                        <th style="width:40%">Descripción</th>
                        <th style="width:25%">Estatus</th>
                        <th style="width:10%"><a class="btn btn-primary btn-sm" href="{!! route('citas.create') !!}" title="crear cita"><i class="fa fa-circle-plus"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->descripcion }}</td>
                        <td>{{ $cita->estatus }}</td>
                        <td>
                            @can('ventas.update')
                            <a class="btn btn-secondary btn-sm" href="{!! route('citas.edit', $cita->id) !!}" title="editar cita"><i class="fa fa-edit"></i></a>
                            &nbsp;
                            @endcan
                            @can('ventas.destroy')
                            <form class="d-inline" action="{!! route('citas.destroy', $cita->id) !!}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="btn btn-danger btn-sm" type="submit" title="borrar cita"><i class="fa fa-trash"></i></button>
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