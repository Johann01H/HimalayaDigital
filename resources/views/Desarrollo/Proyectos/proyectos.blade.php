@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')

@push('CSS')
    <style>
        .general-container {
            background-color: transparent !important;
            box-shadow: none !important;
            padding: -0px !important;
        };

        .btn-primary
        {
            background-color: #00BDF8 !important;
        }

    </style>
@endpush

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach (range(1, 12) as $index)
        <div class="mt-4 col">
            <div class="card card-box">
                <img class="card-img-top" src="{{ asset('vendors/images/img2.jpg') }}" alt="Card image cap">
                <div class="text-center card-body">
                    <h5 class="card-title weight-500">Card title</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus omnis
                        repellendus obcaecati quibusdam et debitis ducimus nisi! Perspiciatis hic minus ratione quis,
                        porro repellendus vero, nemo, deserunt modi nobis quod?
                    </p>
                        <a href="#" class="btn btn-primary btn-lg">Acceder</a>
                        <a href="#" class="btn btn-secondary btn-lg">Editar</a>
                        <a href="#" class="btn btn-danger btn-lg">Eliminar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@push('JS')
    <script src="{{ url('vendors/scripts/core.js')  }}"></script>
    <script src="{{ url('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ url('vendors/scripts/process.js') }}"></script>
    <script src="{{ url('vendors/scripts/layout-settings.js') }}"></script>
@endpush


@endsection
