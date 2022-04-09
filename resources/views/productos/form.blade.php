@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box"></i> <?php echo $producto->exists ? 'Editar' : 'Crear' ?> producto
        </div>
        <div class="card-body">
            {{ html()->modelForm($producto, $producto->exists ? 'put' : 'post', $producto->exists ? route('productos.update', $producto->id) : route('productos.store'))->attributes(['id' => 'formulario'])->open() }}

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría</label>
                {{ html()->select('categoria_id', $categorias)->placeholder('Selecciona')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="producto" class="form-label">Producto</label>
                {{ html()->text('producto')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="costo_unitario" class="form-label">Costo unitario</label>
                {{ html()->text('costo_unitario')->class('form-control form-control-sm')->attributes(['type' => 'number', 'min' => 0, 'max' => '2000']) }}
            </div>
            
            <div class="mb-3">
                <label for="precio_unitario" class="form-label">Precio unitario</label>
                {{ html()->text('precio_unitario')->class('form-control form-control-sm')->attributes(['type' => 'number', 'min' => 0, 'max' => '2000']) }}
            </div>
            
            <div class="mb-3">
                <label for="existencias" class="form-label">Existencias</label>
                {{ html()->text('existencias')->class('form-control form-control-sm')->attributes(['type' => 'number', 'min' => 0, 'max' => '2000']) }}
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                {{ html()->textArea('descripcion')->class('form-control form-control-sm')->attributes(['rows' => 0]) }}
            </div>

            <div class="mb-3">
                <label for="estatus0" class="form-label">Estatus</label>
                <div>
                    <div class="form-check form-check-inline">
                        {!! html()->radio('estatus', 'activo' == $producto->estatus, 'activo')->class('form-check-input')->attributes(['id' => 'estatus0']) !!}
                        <label class="form-check-label" for="estatus0">activo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        {!! html()->radio('estatus', 'inactivo' == $producto->estatus, 'inactivo')->class('form-check-input')->attributes(['id' => 'estatus1']) !!}
                        <label class="form-check-label" for="estatus1">inactivo</label>
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
