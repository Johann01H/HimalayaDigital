@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ url('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">

        <style>
            .general-container {
                background-color: transparent !important;
                padding: 0px !important;
            }

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

            label {
                color: white;
            }

            .contact-directory-box .contact-name,
            .contact-directory-box .contact-skill {
                padding-bottom: 25px;
            }
        </style>
    @endpush

@section('button-press')
    <a href="{{ url('superadmin/createUser') }}" class="btn btn-secondary"><i
            class="icon-copy fa fa-plus"aria-hidden="true"></i>
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

    <div class="modal fade" id="update-success-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

{{-- star inputs group --}}
<div class="row justify-content-between pb-4">
    <div class="col-md-4">
        <div class="form-group">
            <label>Nombre: </label>
            <input type="search" id="searchName" class="searchName" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="user-filter">Areas:</label>
            <select class="form-control" name="" id="">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>
    </div>
</div>
<div class="row" id="alterUser">
    @foreach ($users as $user)
        <div class="col-md-3 pb-5">
            <div class="contact-directory-box">
                <div class="contact-dire-info text-center">
                    <div class="contact-avatar">
                        <span>
                            <img src="{{ asset('vendors/images/photo9.jpg') }}" alt="">
                        </span>
                    </div>
                    <div class="contact-name">
                        <h4>{{ $user->nombre }}</h4>
                        <div class="work text-success"><i class="ion-android-person"></i> {{ $user->cargo }}</div>
                    </div>
                    <div class="contact-skill">
                        <span class="badge badge-pill">{{ $user->areas->nombre }}</span>
                    </div>
                </div>
                <div class="view-contact">
                    <a href="#">View Profile</a>
                </div>
            </div>
        </div>
    @endforeach
    
</div>
<div class="d-flex justify-content-between align-items-center text-white">
    <div>
        Mostrando {{ $users->firstItem() }} a {{ $users->lastItem() }} de {{ $users->total() }} resultados
    </div>
    <div>
        {{ $users->links() }}
    </div>
</div>

{{-- end inputs groups --}}





@push('JS')
<script>
    $(document).ready(function(){
        let timeout = null;
        const searchInput = $('#searchName');
        const userContainer = $('#alterUser');
        
    })
</script>
    {{-- <div class="pb-20">
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
</div> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <!-- Cargar dependencias base primero -->
    {{-- <script src="{{ asset('vendors/scripts/core.js') }}"></script>
<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('vendors/scripts/process.js') }}"></script>

<!-- Luego cargar plugins de DataTables -->
<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script> --}}

    {{-- <script>
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
</script> --}}

    <script>
        $(document).ready(function() {
            @if (session('updateSuccess'))
                $('#update-success-modal').modal('show');
            @endif
        });
    </script>

    <script>
        $(document).ready(function() {
            @if (session('success'))
                $('#success-modal').modal('show');
            @endif
        });
    </script>
@endpush
@endsection
