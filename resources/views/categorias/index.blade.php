@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box-open"></i> Categorías
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:45%">Categoría</th>
                        <th style="width:45%">Estatus</th>
                        <th style="width:10%">
                            @can('categorias.create')
                            <a class="btn btn-primary btn-sm" href="{!! route('categorias.create') !!}" title="crear categoría"><i class="fa fa-circle-plus"></i></a>
                            @endcan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->categoria }}</td>
                        <td>{{ $categoria->estatus }}</td>
                        <td>
                            @can('categorias.update')
                            <a class="btn btn-secondary btn-sm" href="{!! route('categorias.edit', $categoria->id) !!}" title="editar categoría"><i class="fa fa-edit"></i></a>
                            &nbsp;
                            @endcan
                            @can('categorias.destroy')
                            <form class="d-inline" action="{!! route('categorias.destroy', $categoria->id) !!}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="btn btn-danger btn-sm" type="submit" title="borrar categoría"><i class="fa fa-trash"></i></button>
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