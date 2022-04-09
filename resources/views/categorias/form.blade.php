@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box-open"></i> <?php echo $categoria->exists ? 'Editar' : 'Crear' ?> categoría
        </div>
        <div class="card-body">
            {{ html()->modelForm($categoria, $categoria->exists ? 'put' : 'post', $categoria->exists ? route('categorias.update', $categoria->id) : route('categorias.store'))->attributes(['id' => 'formulario'])->open() }}

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                {{ html()->text('categoria')->class('form-control form-control-sm') }}
            </div>

            <div class="mb-3">
                <label for="estatus0" class="form-label">Estatus</label>
                <div>
                    <div class="form-check form-check-inline">
                        {!! html()->radio('estatus', 'activa' == $categoria->estatus, 'activa')->class('form-check-input')->attributes(['id' => 'estatus0']) !!}
                        <label class="form-check-label" for="estatus0">activa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        {!! html()->radio('estatus', 'inactiva' == $categoria->estatus, 'inactiva')->class('form-check-input')->attributes(['id' => 'estatus1']) !!}
                        <label class="form-check-label" for="estatus1">inactiva</label>
                    </div>
                </div>
            </div>
            
            {!! html()->button('<i class="fa fa-save"></i> guardar')->type('submit')->class('btn btn-primary btn-sm') !!}

            {{ html()->closeModelForm() }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator !!}
@endsection
