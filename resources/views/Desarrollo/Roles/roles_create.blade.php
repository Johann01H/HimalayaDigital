@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')

@section('button-press')
    <a href="{{ url('superadmin/forumRoles') }}" class="btn btn-secondary"><i class="icon-copy fa fa-reply" aria-hidden="true"></i>
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
@endpush


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('Roles.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nombre lógico</label>
                            <input type="text" name="nm-lo" class="form-control" required value="{{ old('nm-lo') }}">
                        </div>
                        @error('nm-lo')
                        <div class="alert alert-danger" id="error-alert">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nombre a mostrar</label>
                        <input type="text" name="nm-mo" class="form-control" required value="{{ old('nm-mo') }}">
                    </div>
                    @error('nm-lo')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-11">
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <input type="text" name="dc-ion" class="form-control" required value="{{ old('dc-ion') }}">
                    </div>
                    @error('dc-ion')
                    <div class="alert alert-danger" id="error-alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success col-11 btn-lg" value="Añadir rol nuevo">
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
