@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')

@section('button-press')
    <a href="{{ url('forumRoles') }}" class="btn btn-secondary"><i class="icon-copy fa fa-reply" aria-hidden="true"></i>
        Volver</a>
@endsection

@push('CSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <style>
        .btn-secondary {
            background-color: #15baee !important;
            border-color: #15baee !important;
        }

        .btn-secondary:hover {
            background-color: #15baee !important;
        }
    </style>


    @if (session('successRoleUpdate'))
        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="text-center modal-body font-18">
                        <h3 class="mb-20">{{ session('successRoleUpdate') }}</h3>
                        <div class="text-center mb-30">
                            <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                        </div>
                        <p>El rol se ha creado exitosamente en el sistema. Ahora puedes asignarlo a los usuarios
                            correspondientes o gestionarlo desde el módulo de configuración. ¡Gracias por usar nuestra
                            plataforma!</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endpush
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('update.roles', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nombre lógico</label>
                            <input type="text" name="nm-lou" class="form-control" required
                                value="{{ $role->nombre ?? '¡El nombre no existe!' }}">
                        </div>
                        @error('nm-lou')
                            <div class="alert alert-danger" id="error-alert">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nombre a mostrar</label>
                        <input type="text" name="nm-mou" class="form-control" required
                            value="{{ $role->display_name ?? '!El nombre a mostras no existe!' }}">
                    </div>
                    @error('nm-mou')
                        <div class="alert alert-danger" id="error-alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-11">
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <input type="text" name="dc-ionu" class="form-control" required value="{{ $role->descripcion ?? 'Agregue una descripcion' }}">
                    </div>
                    @error('dc-ionu')
                        <div class="alert alert-danger" id="error-alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success col-11 btn-lg" value="Actualizar rol">
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-6" style="background-color: #004EA4;">
            <div class="p-5 text-center">
                <img src="{{ asset('vendors/images/Logo_Himalaya_blanco-10.png') }}" alt="logo_himalaya">
            </div>
        </div>
    </div>
</div>
@push('JS')
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
@endpush
@endsection
