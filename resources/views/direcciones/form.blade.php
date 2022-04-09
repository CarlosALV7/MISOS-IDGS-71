@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box"></i> <?php echo $direccion->exists ? 'Editar' : 'Crear' ?> Direccion
        </div>
        <div class="card-body">
            {{ html()->modelForm($direccion, $direccion->exists ? 'put' : 'post', $direccion->exists ? route('direcciones.update', $direccion->id) : route('direcciones.store'))->attributes(['id' => 'formulario'])->open() }}

            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                {{ html()->select('usuario_id', $users)->placeholder('Selecciona')->class('form-control form-control-sm') }}
            </div>

            <div class="mb-3">
                <label for="estado_id" class="form-label">Estado</label>
                {{ html()->select('estado_id', $estados)->placeholder('Selecciona')->class('form-control form-control-sm') }}
            </div>

            <div class="mb-3">
                <label for="municipio_id" class="form-label">Municipio</label>
                {{ html()->select('municipio_id', $municipios)->placeholder('Selecciona')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="localidad" class="form-label">Localidad</label>
                {{ html()->text('localidad')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="calle" class="form-label">Calle</label>
                {{ html()->text('calle')->class('form-control form-control-sm') }}
            </div>
            
            <div class="mb-3">
                <label for="numero_exterior" class="form-label">Numero exterior</label>
                {{ html()->text('numero_exterior')->class('form-control form-control-sm')->attributes(['type' => 'number', 'min' => 0, 'max' => '2000']) }}
            </div>
            
            <div class="mb-3">
                <label for="codigo_postal" class="form-label">Código postal</label>
                {{ html()->text('codigo_postal')->class('form-control form-control-sm')->attributes(['type' => 'number', 'min' => 0, 'max' => '2000']) }}
            </div>
            
            <div class="mb-3">
                <label for="referencias" class="form-label">Referencias</label>
                {{ html()->textArea('referencias')->class('form-control form-control-sm')->attributes(['rows' => 0]) }}
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
