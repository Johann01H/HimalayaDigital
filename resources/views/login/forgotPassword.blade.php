<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>


    <style>
        .login-box {
            max-width: 460px;
        }

        .login-box .login-title {
            padding: 0 0 10px;
            margin-bottom: 28px;
            background-color: #fff;
            width: 459px;
            margin-left: -20px;
            margin-top: -41px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-wrap {
            height: calc(100% - 70px);
            overflow: visible;
            padding: 18px 0;
        }

        .alert {
            display: none;
            /* Inicialmente oculta */
            opacity: 0;
            transform: translateY(-20px);
            /* La alerta comenzará desde 20px por encima */
            transition: opacity 0.5s ease, transform 0.5s ease;
            /* Suaviza la transición de opacidad y desplazamiento */
        }

        /* Alerta visible con animación */
        .alert.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
            /* Se desliza desde arriba */
        }

        /* Animación de desvanecimiento */
        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .login-box {
            background: rgba(0, 46, 96, 0.75) !important;
            color: white;
        }

        .fa {
            font-size: 40px;
        }

        .alert-dismissible{
            padding-right: 2rem !important;
        }
    </style>
</head>

<body
    style="background-color: #003675; background-image: url('vendors/images/Sherpa.png'); background-repeat: no-repeat; background-size: 980px; height: 100px;">
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="login-box bg-white box-shadow">
                        <div class="login-title">
                            <img src="{{ asset('vendors/images/logo-himalaya-login.png') }}" alt="logo_himalaya"
                                style="width: 190">
                        </div>
                        <h6 class="mb-20 text-center text-white">Ingresa tu dirección de correo electrónico para
                            restablecer tu contraseña</h6>
                        <form method="POST" action="{{ url('storeForgotPassword') }}">
                            @csrf
                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" name="email"
                                    placeholder="user@email.com" value="{{ old('email') }}" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i
                                            class="fa fa-envelope-o"aria-hidden="true"></i></span>
                                </div>
                            </div>
                            @if (session('successEmail'))
                                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                    <i class="icon-copy fa fa-check-circle" aria-hidden="true"></i>
                                    <br>
                                    {{ session('successEmail') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('errorEmail'))
                                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                    <i class="icon-copy fa fa-warning" aria-hidden="true"></i>
                                    <br>
                                    {{ session('errorEmail') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-success btn-lg btn-block" type="submit" value="Enviar">
                                    </div>
                                </div>
                                <div class="col-2">
                                </div>
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <a class="btn btn-info btn-lg btn-block" href="{{ url('login') }}">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>
