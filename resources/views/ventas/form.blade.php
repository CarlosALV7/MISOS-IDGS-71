@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box"></i> <?php echo $venta->exists ? 'Editar' : 'Crear' ?> Venta
        </div>
        <div class="card-body">
            {{ html()->modelForm($venta, $venta->exists ? 'put' : 'post', $venta->exists ? route('ventas.update', $venta->id) : route('ventas.store'))->attributes(['id' => 'formulario'])->open() }}

            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                {{ html()->select('usuario_id', $users)->placeholder('Selecciona')->class('form-control form-control-sm') }}
            </div>

            <div class="mb-3">
                <label for="producto_id" class="form-label">Producto</label>
                {{ html()->select('producto_id', $productos)->placeholder('Selecciona')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                {{ html()->date('fecha')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="Total" class="form-label">Total</label>
                {{ html()->text('total')->class('form-control form-control-sm')->attributes(['type' => 'number', 'min' => 0, 'max' => '2000']) }}
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
