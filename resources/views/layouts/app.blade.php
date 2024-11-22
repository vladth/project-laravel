<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield("title")</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('media/img/logo/ANITA1.png') }}"/>
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('media/img/logo/ANITA1.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/img/logo/ANITA1.png') }}">
    <!-- END Icons -->


    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/codebase.min.css') }}">

    <!-- Styles SELECT2-->
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.css') }}">
    
    <link rel="stylesheet" href="{{ asset('js/addtables/overhang-notify/overhang.min.css')}}">
    <link rel="stylesheet" href="{{ asset('js/addtables/form-validator/theme-default.min.css')}}">

    <style type="text/css">
        @media print {
            .no-print, page-wrapper-img {
                display: none !important;
            }
            .print{
                display: block !important;
            }
        }
    </style>
    @yield("styles")
    @stack("styles")
</head>
<body onload="startTime()">

<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item">
                    <a class="img-link mr-5" href="/home">
                        <img class="img-avatar img-avatar32" src="{{asset('imagenes/usuario/'.Auth::user()->imagen)}}" alt="">
                    </a>
                    <a class="align-middle text-primary-dark font-w600" href="">{{ auth()->user()->nombre }}</a>
                </div>
                <!-- Side Content -->
                <div class="content-side">
                    <!-- Profile -->
                    <div class="block pull-r-l">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title">
                                <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Perfil
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            
                        </div>
                    </div>
                    <!-- END Profile -->
                </div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <!--desabilitar para letras <a class="link-effect font-w700" href="/home">-->
                        <a class="font-w700" href="/">
                            <span class="font-size-xl text-dual-primary-dark"><img src="{{ asset('media/img/logo/ANITA9.png')}}" width="200" height="50"></span>
                            <!--<span class="font-size-xl text-dual-primary-dark">SISTEMA </span><span class="font-size-xl text-primary">CONT-CIT</span>-->
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="{{ asset('media/img/ico/favicon-32x32.png') }}" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="/home">
                        <!--<img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">-->
                        <img src="{{asset('imagenes/usuario/'.Auth::user()->imagen)}}" class="img-avatar" class="img-avatar" alt="{{ Auth::user()->email }}">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <small>
                                <a class="text-dual-primary-dark font-size-sm font-w600 text-capitalize" href="/home">{{ auth()->user()->nombre }}</a>
                            </small>
                        </li>
                        <li></li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                <i class="si si-drop"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" data-toggle="tooltip" title="Salir">
                                <i class="si si-logout"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    @if(Auth::check())
                        @if (Auth::user()->idrol == 1)
                            @include('dir.admin')
                        @elseif (Auth::user()->idrol == 2)
                            @include('dir.contador')
                        @elseif (Auth::user()->idrol == 3)
                            @include('dir.auxiliar')
                        @elseif (Auth::user()->idrol == 4)
                            @include('dir.vendedor')
                        @else
                            <h3 class="block-title text-danger text-center">¡¡¡Usted no tiene permisos!!! <small class="text-primary"> Consulte con su Administrador</small></h3>
                        @endif

                    @endif
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-navicon"></i>
                </button>
                <!-- END Toggle Sidebar -->


                <!-- Layout Options (used just for demonstration) -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                <!-- User Dropdown -->
                <!-- Button salir   -->

                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{ auth()->user()->email }}</span>
                        <i class="fa fa-angle-down ml-5"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                        <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase"><i class="si si-user mr-5"></i> Usuario</h5>


                        <!-- Toggle Side Overlay -->
                        @if(Auth::check())
                            @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 3 or Auth::user()->idrol == 4)
                                <a class="dropdown-item" href="{{url('usuario')}}">
                                    <i class="si si-wrench mr-5"></i> Configuración
                                </a>
                            @else
                                
                            @endif

                        @endif

                        <!-- END Side Overlay -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="si si-logout mr-5"></i> Salir
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- END User Dropdown -->


                <!-- END Layout Options -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header">
            <div class="content-header content-header-fullrow">
                <form action="be_pages_generic_search.html" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Close Search Section -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- END Close Search Section -->
                        </div>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header content-header-fullrow text-center">
                <div class="content-header-item">
                    <i class="fa fa-sun-o fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            @yield("content")
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-sm clearfix">
            <div class="float-right">


            Desarrollado por <a class="font-w600" href="" target="_blank">E.Barrera P.</a> <i class="fa fa-heart text-pulse"></i>
            </div>
            
            <div class="float-left">
                <a class="font-w600" href="" target="_blank">AAna 1.0</a> &copy; <span class="js-year-copy"></span>
            </div>
            
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<script src="{{ asset('js/codebase.core.min.js') }}"></script>
<script src="{{ asset('js/codebase.app.min.js') }}"></script>
<script src="{{ asset('js/addtables/overhang-notify/overhang.min.js') }}"></script>
<script src="{{asset('js/addtables/form-validator/jquery.form-validator.min.js')}}"></script>

<!--****Scripts para aletar y cargar y otros*****-->
<script src="{{asset('js/pace.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>

<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
 <script src="{{ asset('js/plugins/select2/js/i18n/es.js') }}"></script>
 <script>
      jQuery(function(){ 
          Codebase.helpers(['select2']); 
      });
</script>

<!--*********dev*********-->

<script src="{{asset('dev/time.js')}}"></script>

<script src="{{asset('dev/reg.js')}}"></script>

<script src="{{asset('dev/alert.js')}}"></script>

<script src="{{asset('dev/dateformat.js')}}"></script>

@yield("scripts")
@stack("scripts")
</body>
</html>
