@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')
        <style>
            .btn-secondary {
                background-color: #15baee !important;
                border-color: #15baee !important;
                color: white !important;
                font-weight: bolder !important; 

            }

            .btn-secondary:hover {
                background-color: #004EA4 !important;
                border-color: #004EA4 !important;
            }

            .color-header-table {
                background-color: #004EA4 !important;
                color: #fff !important;
            }

            .table-plus::before {
                color: #ffff !important;
                font-size: medium !important;
            }

            .data-table-usuario thead tr th:first-child {
                border-top-left-radius: 10px;
                border-bottom-left-radius: 10px;
            }

            .data-table-usuario thead tr th:last-child {
                border-top-right-radius: 10px !important;
                border-bottom-right-radius: 10px !important;
            }
        </style>
    @endpush

@section('button-press')
    <a href="{{ url('superadmin/createRoles') }}" class="btn btn-secondary">Establecer un rol</a>
@endsection

{{-- ELIMINAR ROLES -> DIRECTOR EJECUTIVO, CUENTAS, CLIENTES --}}

@if (session('successRole'))
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="text-center modal-body font-18">
                    <h3 class="mb-20">{{ session('successRole') }}</h3>
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

<div class="pb-20">
    <table class="table table-striped data-table-usuario stripe hover ">
        <thead>
            <tr class="color-header-table">
                <th class="table-plus datatable-nosort">Nombre lógico</th>
                <th>Nombre a mostrar</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Roles as $role)
                <tr>
                    <td>{{ $role->display_name }}</td>
                    <td>
                        @if (isset($role->descripcion))
                            {{ $role->descripcion }}
                        @else
                            Agregue una descripcion
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('editRoles/' . $role->id) }}"
                            class="btn btn-primary d-flex justify-content-center col-6"><i
                                class="text-white fa fa-edit"></i></a>
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
    <script>
        $(document).ready(function() {
            $('#success-modal').modal('show');
        });
    </script>
    <script src="{{ url('vendors/scripts/core.js') }}"></script>
    <script src="{{ url('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ url('vendors/scripts/process.js') }}"></script>
    <script src="{{ url('vendors/scripts/layout-settings.js') }}"></script>
@endpush
@endsection
