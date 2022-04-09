@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-box-open"></i> <?php echo $cita->exists ? 'Editar' : 'Crear' ?> Cita
        </div>
        <div class="card-body">
            {{ html()->modelForm($cita, $cita->exists ? 'put' : 'post', $cita->exists ? route('citas.update', $cita->id) : route('citas.store'))->attributes(['id' => 'formulario'])->open() }}

            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                {{ html()->select('usuario_id', $users)->placeholder('Selecciona')->class('form-control form-control-sm') }}
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                {{ html()->date('fecha')->class('form-control form-control-sm') }}
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                {{ html()->text('descripcion')->class('form-control form-control-sm row:5') }}
            </div>

            <div class="mb-3">
                <label for="estatus0" class="form-label">Estatus</label>
                <div>
                    <div class="form-check form-check-inline">
                        {!! html()->radio('estatus', 'activa' == $cita->estatus, 'asistio')->class('form-check-input')->attributes(['id' => 'estatus0']) !!}
                        <label class="form-check-label" for="estatus0">asistio</label>
                    </div>
                    <div class="form-check form-check-inline">
                        {!! html()->radio('estatus', 'inactiva' == $cita->estatus, 'no asistio')->class('form-check-input')->attributes(['id' => 'estatus1']) !!}
                        <label class="form-check-label" for="estatus1">no asistio</label>
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
