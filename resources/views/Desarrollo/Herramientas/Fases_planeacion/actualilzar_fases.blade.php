@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')

    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
        <style>
            .general-container {
                border-top: 4px solid green;
                padding: 20px;
            }

            textarea {
                max-height: 142px !important;
            }

            .btn-secondary {
                background-color: #15baee !important;
                border-color: #15baee !important;
            }

            .btn-secondary:hover {
                background-color: #15baee !important;
            }

            .mt-6 {
                margin-top: 6rem !important;
            }

            .mt-10 {
                margin-top: 10rem !important;
            }

            .mt-13 {
                margin-top: 13em !important;
            }
        </style>
    @endpush

@section('button-press')
    <a href="{{ url('fasesPlaneacion') }}" class="btn btn-secondary">Volver</a>
@endsection

@if (session('updateErrorSuccess'))

    <div class="modal fade" id="fase-error-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">{{ session('updateErrorSuccess') }}</h3>
                    <div class="mb-30 text-center">
                        <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                    </div>
                    <p class="text-center text-danger"> Ocurrió un error al intentar actualizar el usuario en el
                        sistema. Por favor, verifica los datos ingresados e inténtalo nuevamente. Si el problema
                        persiste, contacta al administrador del sistema. </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endif


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('update.fase.planeación',['id' => $fase_planeacion->id]) }}" method="POST">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nmu-fase"><span class="text-danger">*</span>Nombre:</label>
                            <input type="text" class="form-control" value="{{ $fase_planeacion->nombre }}" name="nmu-fase">
                        </div>
                        @error('nmu-fase')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tpu-planeacion"><span class="text-danger">*</span>Tipo de planeacion:</label>
                            <select name="tpu-planeacion" class="form-control">
                                <option value="">Seleccione un tipo de planeacion</option>
                                @foreach ($planeaciones as $planeacion)
                                <option value="{{ $planeacion->id }}" 
                                    {{ (old('tp-planeacion') == $planeacion->id || $fase_planeacion->planeaciones_tipos_id == $planeacion->id) ? 'selected' : '' }}>
                                    {{ $planeacion->nombre }}
                                </option>                          
                            @endforeach
                            </select>
                        </div>
                        @error('tpu-planeacion')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success col-12">Actualizar fase de planeación</button>
                    </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-center" style="background-color: #004EA4;">
            <img src="{{ asset('vendors/images/Logo_Himalaya_blanco-10.png') }}" alt="logo_himalaya">
        </div>
    </div>
</div>
</div>



@push('JS')
<script>
    $(document).ready(function() {
        @if (session('updateErrorSuccess'))
            $('fase-error-modal').show('modal');
        @endif
    })
</script>
@endpush
@endsection
