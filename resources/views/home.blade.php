@extends('layouts.app')
@section("title","Inicio | Amortiguadores ANA")
@section("styles")
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.css') }}">
@endsection
@section('content')
        @if(Auth::check())
            @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2)
            <!-- Breadcrumb -->
        <div class="container-fluid">

        @foreach($totales as $total)
        <div class="row invisible" data-toggle="appear">
        <!-- Row #1 -->
        <div class="col-6 col-xl-3">
            <a class="block block-link-shadow text-right" href="{{url('venta')}}">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-bag fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-h3 font-w600">Bs <span data-toggle="countTo" data-speed="1000" data-to="{{$total->totalventa}}">0</span></div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Ventas</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-3">
            <a class="block block-link-shadow text-right" href="{{url('compra')}}">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-wallet fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-h3 font-w600">Bs <span data-toggle="countTo" data-speed="1000" data-to="{{$total->totalcompra}}">0</span></div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Compras</div>
                </div>
            </a>
        </div>
        @endforeach
        <!-- END Row #1 
        -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1)
        @foreach($totalu as $tl)
        <div class="col-6 col-xl-3">
            <a class="block block-link-shadow text-right" href="{{url('user')}}">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-users fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{$tl->total}}">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Usuarios</div>
                </div>
            </a>
        </div>
        @endforeach
    @else
        <div class="col-6 col-xl-3">
            <a class="block block-link-shadow text-right" href="">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="fa fa-clock-o fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-h3 font-w600" id="clock"></div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Hora</div>
                </div>
            </a>
        </div>
    @endif
@endif
        <!-- END Row #1 -->
    </div>
                <div class="row">
                        <div class="col-md-6">
                                <!-- Ventas dia -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Ventas <small> Dia</small></h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                <i class="si si-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-center">
                                        <!-- Polar Area Chart Container -->
                                        <canvas id="ventasD"></canvas>
                                    </div>
                                </div>

                            </div><!--col-md-6-->

                            <div class="col-md-6">
                                <!-- Productos vendidos -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Productos <small> Vendidos</small></h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                <i class="si si-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-center">
                                        <!-- Polar Area Chart Container -->
                                        <canvas id="productosvendidos"></canvas>
                                    </div>
                                </div>

                            </div><!--col-md-6-->

                        <!-- Estadísticas gráficos -->


                            <div class="col-md-6">
                                
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Ventas <small> Mensuales</small></h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                <i class="si si-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-center">
                                        <!-- Polar Area Chart Container -->
                                        <canvas id="ventas"></canvas>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <!-- compras - meses -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Compras <small> Mensuales</small></h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                <i class="si si-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-center">
                                        <!-- Polar Area Chart Container -->
                                        <canvas id="compras"></canvas>
                                    </div>
                                </div>

                            </div><!--col-md-6-->
                            <div class="col-md-12">
                                <!-- Balance - general 
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Balance <small> General</small></h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                <i class="si si-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-center">
                                        <!-- Polar Area Chart Container -->
                                        <!--<canvas id="balancePolar"></canvas>
                                    </div> #1
                                </div>-->
                            </div><!--col-md-6-->

                        </div><!--row-->
        </div>
    </div>

            @elseif (Auth::user()->idrol == 3 or Auth::user()->idrol == 4)
            <div class="container-fluid">
                <div class="bg-image bg-image-bottom"  style="background-image: url({{ asset('media/img/const/12.jpg') }});">
                    <div class="bg-primary-dark-op">
                        <div class="content content-top text-center overflow-hidden">

                            <div class="pt-50 pb-20">
                                <h1 class="font-w700 text-white mb-10 js-appear-enabled animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp">BIENVENIDO</h1>
                                <h2 class="h4 font-w400 text-white-op js-appear-enabled animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp">¡Este es su panel personalizado!</h2>
                                <h2 class="h4 font-w400 text-white-op js-appear-enabled animated fadeInUp block-title">Apunta a la luna. Si fallas, podrías dar a una estrella.</h2>
                                <h2 class="h4 font-w400 text-white-op js-appear-enabled animated fadeInUp block-title">Da siempre lo mejor que tienes. Lo que plantes ahora, lo cosecharás más tarde.</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class=""><br></div>
            <div class="container-fluid block-title">
                <div class="map-clean">
                <div class="container">
                    <div class="intro">
                        <h2 class="text-uppercase text-center block-title" style="font-family: Spectral, serif;">Dirección</h2>
                        <p class="text-center block-title" style="font-family: Spectral, serif;">La Paz – Av. San José Nro. 2217, esquina Av. Florida Zona Munaypata</p>
                    </div>
                </div>
                <iframe allowfullscreen="" frameborder="0" width="100%" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d956.4367084600681!2d-68.16121417081852!3d-16.488351999288945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTbCsDI5JzE4LjEiUyA2OMKwMDknMzguNCJX!5e0!3m2!1ses!2sbo!4v1591278182675!5m2!1ses!2sbo"></iframe>
                </div>
            </div>

            @else
        <!-- Page Content -->

        <div class="hero-inner">
            <div class="content content-full">
                <div class="py-30 text-center">
                    <div class="display-3">
                        <h3 class="text-danger "><i class="fa fa-lock text-danger"></i> | 401</h3>
                    </div>
                    <h1 class="h2 font-w700 mt-30 mb-10 text-danger block-title">¡Vaya! Acabas de encontrar una página de error.</h1>
                    <h2 class="h3 font-w400 text-muted mb-20 text-info">Lo sentimos pero no está autorizado para acceder a esta página.</h2>
                    <a class="btn btn-hero btn-rounded btn-alt-secondary" href="{{url('/home')}}">
                                    <i class="fa fa-arrow-left mr-10"></i>
                    </a>
                </div>
            </div>
        </div>

    <!-- END Page Content -->
    @endif
@endif


@endsection
@section("scripts")

    <!--*************************************-->
    <script src="{{asset('js/Chart.min.js')}}"></script>

    <script>
                    $(function () {


                        var varCompra=document.getElementById('compras').getContext('2d');

                            var charCompra = new Chart(varCompra, {
                                type: 'line',
                                data: {
                                    labels: [<?php foreach ($comprasmes as $reg) {

                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                    $mes_traducido = strftime('%B', strtotime($reg->mes));

                                    echo '"' . $mes_traducido . '",';}?>],
                                    datasets: [
                                     {
                                        label: 'COMPRAS MES',
                                        data: [
                                                <?php 
                                                    foreach ($comprasmes as $reg) {echo '' . $reg->totalmes . ',';}
                                                 ?>
                                              ],
                                        backgroundColor: 'rgba(0, 0, 0, 0)',
                                        borderColor: 'rgba(245, 206, 10, 0.97)',
                                        borderWidth: 2
                                      }
                                    ]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });

                        var varVenta=document.getElementById('ventas').getContext('2d');

                            var charVenta = new Chart(varVenta, {
                                type: 'line',
                                data: {
                                    labels: [<?php foreach ($ventasmes as $reg) {
                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                    $mes_traducido = strftime('%B', strtotime($reg->mes));

                                    echo '"' . $mes_traducido . '",';}?>],
                                    datasets: [
                                      {
                                        label: 'VENTAS MES',
                                        data: [
                                                <?php 
                                                    foreach ($ventasmes as $reg) {echo '' . $reg->totalmes . ',';}
                                                ?>
                                               ],
                                        backgroundColor: 'rgba(0, 0, 0, 0)',
                                        borderColor: 'rgba(132, 8, 181, 0.97)',
                                        borderWidth: 2
                                      }
                                    ]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
  
                        var varVentaDia=document.getElementById('ventasD').getContext('2d');

                            var charVentaDia = new Chart(varVentaDia, {
                                type: 'line',
                                data: {
                                    labels: [<?php foreach ($ventasdia as $reg) {
                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                    $dia_traducido = $reg->dia;

                                    echo '"' . $dia_traducido . '",';}?>],
                                    datasets: [
                                      {
                                        label: 'VENTAS DIA',
                                        data: [
                                                <?php 
                                                    foreach ($ventasdia as $reg) {echo '' . $reg->totaldia . ',';}
                                                ?>
                                               ],
                                        backgroundColor: 'rgba(0, 0, 0, 0)',
                                        borderColor: 'rgba(9, 220, 9, 0.97)',
                                        borderWidth: 2
                                      }
                                    ]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                   
                        var varProductosVendidos=document.getElementById('productosvendidos').getContext('2d');

                            var charVentaDia = new Chart(varProductosVendidos, {
                                type: 'line',
                                data: {
                                    labels: [<?php foreach ($productosvendidos as $reg) {
                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                    $dia_traducido = $reg->producto;

                                    echo '"' . $dia_traducido . '",';}?>],
                                    datasets: [
                                      {
                                        label: 'PRODUCTOS VENDIDOS',
                                        data: [
                                                <?php 
                                                    foreach ($productosvendidos as $reg) {echo '' . $reg->cantidad . ',';}
                                                 ?>
                                              ],
                                        backgroundColor: 'rgba(0, 0, 0, 0)',
                                        borderColor: 'rgba(9, 202, 206, 0.97)',
                                        borderWidth: 2
                                      }
                                    ]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                    
                    /*************************/
                });

    </script>

@endsection