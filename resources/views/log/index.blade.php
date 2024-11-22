@extends('layouts.app')
@section("title","Acciones")
@section("styles")
    <!-- Page JS Plugins CSS -->
    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dev/datatables.min.css') }}">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dev/responsive.dataTables.min.css') }}">
@endsection
@section('content')

@if(Auth::check())
    @if (Auth::user()->idrol == 1)
	<!--Contenido-->
	<div class="col-lg-12 ">         
        <h2 class="content-heading">ADMINISTRACION DE ACCIONES</h2>
    </div>

                <div class="container-fluid">
                <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Acciones <small> del usuario en el sistema</small></h3>
                            <a href="{{ url('user') }}">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                                </button>
                            </a>
                        </div>

                        <div class="block-content block-content-full">

                                    {!! $logItems->render() !!}
                                    <table id="config" class="table table-bordered  display nowrap" width="100%">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Fecha - Hora</th>
                                            <th>Causado en</th>
                                            <th>Descripción</th>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th class="text-center">acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($logItems as $logItem)
                                            <tr>
                                                <td>{{ ++$cont }}</td>
                                                <td>{{ $logItem->created_at->calendar() }}</td>
                                                <td>{{ $logItem->subject_type}}</td>
                                                <td>{!! $logItem->description !!}</td>
                                                <td>
                                                    @if($logItem->causer)
                                                            {{ $logItem->causer->nombre }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($logItem->causer)
                                                            {{ $logItem->causer->usuario }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <textarea class="form-control" row='12' disabled>
                                                        {{$logItem->properties}}
                                                    </textarea>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $logItems->render() !!}
                                

                        </div>
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
        <!-- Page JS Plugins -->

    <script type="text/javascript" src="{{ asset('dev/datatables.min.js') }}"></script>

    <script src="{{ asset('dev/dataTables.responsive.min.js') }}"></script>
@endsection