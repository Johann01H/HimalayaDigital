@extends('Desarrollo.layout_desarrollo')


@section('template-blank-development')

    @push('CSS')
        <style>
            .btn-secondary {
                background-color: #15baee !important;
                border-color: #15baee !important;
            }

            .btn-secondary:hover {
                background-color: #15baee !important;
            }

            .color-header-table {
                background-color: #004EA4 !important;
                color: #fff !important;
            }

            .dw {
                color: white !important;
            }

            .table-plus::before {
                color: #ffff !important;
                font-size: medium !important;
            }

            .table-plus::after {
                color: #ffff !important;
                font-size: medium !important;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    @endpush


@section('button-press')
    <a href="{{ url('createPlaneacion') }}" class="btn btn-secondary"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>
        Crear Fase de Planeación</a>
@endsection

@if (session('faseSuccess'))
    <div class="modal fade" id="fase-success-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">{{ session('faseSuccess') }}</h3>
                    <div class="mb-30 text-center">
                        <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                    </div>
                    <p class="text-center"> La fase de planeación se ha creado exitosamente en el sistema. Puedes
                        verificar los detalles y gestionarla desde el módulo de configuración. ¡Gracias por confiar en
                        nuestra plataforma! </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if (session('updateFaseSuccess'))
    <div class="modal fade" id="fase-success-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">{{ session('updateFaseSuccess') }}</h3>
                    <div class="mb-30 text-center">
                        <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                    </div>
                    <p class="text-center">
                        La fase de planeación se ha actualizado exitosamente en el sistema. Puedes verificar los cambios realizados y gestionarla desde el módulo de configuración. ¡Gracias por confiar en nuestra plataforma!
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="pb-20">
    <table class="data-table-usuario table stripe hover">
        <thead>
            <tr class="color-header-table">
                <th>Nombre</th>
                <th>Tipo de planeación</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fases as $fase)
                <tr>
                    <td class="table-plus">{{ $fase->nombre }}</td>
                    <td>{{ $fase->planeaciones_tipos->nombre }}</td>
                    <td>
                    @if ($fase->estado)
                            <span class="btn btn-success rounded-pill">Activo</span>
                        @else
                            <span class="btn btn-danger rounded-pill">Inactivo</span>
                        @endif
                    </td>
                    <td>{{ $fase->created_at }}</td>
                    <td>{{ $fase->updated_at }}</td>
                    <td>
                        <a href="{{url('editFasePlaneacion/'. $fase->id)}}" class="btn btn-primary col-12 rounded-pill text-white"><i class="dw dw-edit2"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('JS')
    <script>
        $('document').ready(function() {
                $('.data-table-usuario').DataTable({

                });
            }) 
    </script>
    <script >
        $(document).ready(function() {
            @if (session('faseSuccess'))
                $('#fase-success-modal').modal('show');
            @endif
        })
        $(document).ready(function(){
            @if (session('updateFaseSuccess'))
                $('#fase-success-modal').modal('show');
            @endif
        })
    </script>
    <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush


@endsection
