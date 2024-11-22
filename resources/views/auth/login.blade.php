<!doctype html>
<html lang="es" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login a Amortiguadores ANA</title>

    <meta name="description" content="Sistema Amortiguadores ANA">
    <meta name="author" content="Erika">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('media/img/logo/ANITA1.png') }}"/>
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('media/img/logo/ANITA1.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/img/logo/ANITA1.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/codebase.min.css') }}">

</head>
<body>

<div id="page-container" class="main-content-boxed">

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('media/img/fondo.jpg');">
            <div class="row mx-0 bg-black-op">
                <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                    <div class="p-30 invisible" data-toggle="appear">
                        <p class="font-italic text-white-op">
                            DerechosReservados &copy; <span class="js-year-copy"></span>
                        </p>
                    </div>
                </div>
                <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                    <div class="content content-full">
                        <!-- Header -->
                        <div class="px-30 py-10 text-center">
                            <a class="font-w700" href="/">
                                <img src="{{ asset('media/img/logo/ANITA5.png')}}" width="350" height="200">
                            </a>
                            <h1 class="h3 font-w700 mt-30 mb-10 text-center">BIENVENIDO</h1>
                            <h2 class="h5 font-w400 text-muted mb-0 text-center">Por favor, inicie sesión con sus datos.</h2>
                        </div>
                        @if (Session::has('message'))
                         <div class="text-danger">
                         {{Session::get('message')}}
                         </div>
                        @endif
                        <!-- END Header -->

                        <form class="px-30" method="POST" action="{{route('login')}}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating {{$errors->has('usuario') ? 'has-error' : ''}}">
                                        <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}"  autocomplete="Usuario" autofocus required>
                                        <label for="login-username">Usuario</label>
                                        <div class="text-danger">
                                        {!!$errors->first('usuario','<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating {{$errors->has('password') ? 'has-error' : ''}}">
                                        <input id="password" type="password" class="form-control " name="password"  autocomplete="current-password" required="">
                                        <label for="login-password">Contraseña</label>
                                        <div class="text-danger">
                                        {!!$errors->first('password','<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar sesion
                                </button>
                                <br><br>
                                <a href="/"><i class="fa fa-reply-all fa-2x" title="Volver Menu" aria-hidden="true"></i></a>
                                <div class="mt-30">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
</div>

<script src="{{ asset('js/codebase.core.min.js') }}"></script>

<script src="{{ asset('js/codebase.app.min.js') }}"></script>

<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

<script src="{{ asset('js/pages/op_auth_signin.min.js') }}"></script>
</body>
</html>
