@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box"></i> <?php echo $detalle_venta->exists ? 'Editar' : 'Crear' ?> Detalles venta
        </div>
        <div class="card-body">
            {{ html()->modelForm($detalle_venta, $detalle_venta->exists ? 'put' : 'post', $detalle_venta->exists ? route('detalles_venta.update', $detalle_venta->id) : route('detalles_venta.store'))->attributes(['id' => 'formulario'])->open() }}

            <div class="mb-3">
                <label for="producto_id" class="form-label">Producto</label>
                {{ html()->select('producto_id', $productos)->placeholder('Selecciona')->class('form-control form-control-sm') }}
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
                <label for="Cantidad" class="form-label">Cantidad</label>
                {{ html()->text('cantidad')->class('form-control form-control-sm')->attributes(['type' => 'number', 'min' => 0, 'max' => '2000']) }}
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
