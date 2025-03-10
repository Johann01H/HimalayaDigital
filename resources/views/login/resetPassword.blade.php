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
            background: rgba(0, 46, 96, 0.75) !important;
            box-shadow: 0px 1px 9px black;
            /* Sombra negra */
        }

        .login-top-image {

            padding: 0 0 10px;
            margin-bottom: 28px;
            background-color: #fff;
            width: 400px;
            margin-left: -20px;
            margin-top: -38px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .login-box .login-title {
            padding: 0 0 10px !important;
            margin-bottom: 8px !important;
        }

        .login-wrap {
            height: calc(100% - 70px);
            overflow: visible;
            padding: 30px 0;
        }

        body {
            background-color: #003675;
            background-image: url('vendors/images/Sherpa.png');
            background-repeat: no-repeat;
            background-size: 980px;
        }
    </style>
</head>

<body>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="login-box">
                        <div class="login-top-image">
                            <img src="{{ asset('vendors/images/logo-himalaya-login.png') }}" alt="logo_himalaya"
                                style="width: 190">
                        </div>
                        <div class="login-title">
                            <h2 class="text-center text-white">Recuperar contraseña</h2>
                        </div>
                        <h6 class="mb-20 text-center text-white">Ingresa tu nueva contraseña, confírmala y haz clic
                            enviar para continuar</h6>
                        <form method="POST" action="{{ route('store.reset.password') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token ?? '' }}">
                            <input type="hidden" name="email" value="{{ $emailUser->email ?? '' }}">

                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" placeholder="Correo electronico" name="email" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-email"></i></span>
                                </div>
                            </div>
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password"
                                    placeholder="Nueva contraseña" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password_confirmation"
                                    placeholder="Confirma tu contraseña">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="input-group mb-0">
                                        <input type="submit" class="btn btn-success btn-block btn-lg"
                                            value="Actualizar contraseña">
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
