@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')

@push('CSS')
    <link rel="stylesheet" type="text/css" href="{{ url('vendors/styles/core.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('vendors/styles/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('vendors/styles/style.css')}}">
    <style>
        .general-container
        {
            background-image: url('{{asset("vendors/images/background_2.png")}}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 40rem;
             
        }
    </style>

@endpush





@push('JS')
    <script src="{{ url('vendors/scripts/core.js')  }}"></script>
    <script src="{{ url('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ url('vendors/scripts/process.js') }}"></script>
    <script src="{{ url('vendors/scripts/layout-settings.js') }}"></script>
@endpush


@endsection
