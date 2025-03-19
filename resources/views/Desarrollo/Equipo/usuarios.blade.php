@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
@push('CSS')

<link rel="stylesheet" type="text/css" href="{{ url('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">

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
<a href="{{ url('superadmin/createUser') }}" class="btn btn-secondary"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>
    Registrar nuevo usuario</a>
@endsection

@if (session('userSuccess'))
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="text-center modal-body font-18">
                <h3 class="mb-20">{{ session('userSuccess') }}</php>
                    <div class="text-center mb-30">
                        <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                    </div>
                    <p class="text-center">El usuario se ha creado exitosamente en el sistema. Ahora puedes
                        asignarle un rol o gestionarlo desde el módulo de configuración. ¡Gracias por usar nuestra
                        plataforma!
                    <p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endif

@if (session('updateSuccess'))
<script>
    $(document).ready(function() {
            @if ('updateSuccess')
                $('#update-success-modal').modal('show');
            @endif
        });
</script>

<div class="modal fade" id="update-success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="text-center modal-body font-18">
                <h3 class="mb-20">{{ session('updateSuccess') }}</h3>
                <div class="text-center mb-30">
                    <img src="{{ asset('vendors/images/success.png') }}" alt="Éxito">
                </div>
                <p class="text-center">El usuario se ha actualizado exitosamente en el sistema. Puedes verificar los
                    cambios realizados o gestionarlo desde el módulo de configuración. ¡Gracias por usar nuestra
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
    <table class="table table-striped data-table-usuario hover wrapper">
        <thead>
            <tr class="color-header-table">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Teléfono</th>
                <th>Referencia</th>
                <th>Rol</th>
                <th>Area</th>
                <th>Estado</th>
                <th>Edicion</th>
            </tr>
        </thead>
    </table>
</div>

@push('JS')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Cargar dependencias base primero -->
<script src="{{ asset('vendors/scripts/core.js') }}"></script>
<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('vendors/scripts/process.js') }}"></script>

<!-- Luego cargar plugins de DataTables -->
<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.data-table-usuario').DataTable({
            ajax: {
                url: "{{ route('api.user') }}",
                error: function(xhr, error, thrown) {
                    console.error('Error al cargar datos:', error);
                    alert('Error al cargar los datos de usuarios. Por favor, recargue la página o contacte al administrador.');
                }
            },
            columns: [
                { data: 'nombre' },
                { data: 'apellido' },
                { data: 'email' },
                { data: 'cargo' },
                { data: 'telefono' },
                { data: 'numero_referencia' },
                { data: 'roles.nombre', defaultContent: 'Sin rol' },
                { data: 'areas.nombre', defaultContent: 'Sin área' },
                { data: 'estado', render: function(data) {
                        return data
                            ? '<span class="badge badge-success rounded-pill"> Activo </span>'
                            : '<span class="badge badge-danger rounded-pill"> Inactivo </span>';
                    }
                },
                { data: 'id', render: function(data){
                    return `<a href="/editUser/${data}" class="text-white btn btn-primary col-12 rounded-pill"><i class="dw dw-edit2"></i></a>`;
                }}
            ],
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        @if(session('updateSuccess'))
            $('#update-success-modal').modal('show');
        @endif
    });
</script>

<script>
    $(document).ready(function() {
        @if(session('success'))
            $('#success-modal').modal('show');
        @endif
    });
</script>
@endpush

@endsection
