@extends('layouts.app')
@section("title","Vista Usuario")
@section('content')
<!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1)
    <div class="col-lg-12 no-print">         
        <h2 class="content-heading">ADMINISTRACION - VISTA DE DATOS DEL USUARIOS</h2>
    </div>
    <div class="container-fluid">
            <!-- Dynamic Table Full -->
            <div class="block">
            	<div class="block-header block-header-default no-print">
                    <h3 class="block-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Tabla de Datos del <small>Usuario</small></h3>
                    <a href="{{ url('user') }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                    </a>

                </div>
                <br>
                <div class="col-lg-12 text-uppercase">
                    <center><span><h2 class="block-title" style="text-decoration: underline;">Datos del Usuario<br></h2></span></center>
                </div>
                <br>
                <div class="col-lg-12">
                    <div class="form-row">
                    	<div class="form-group col-md-12 text-capitalize">
                    		<div class="form-row">
                                @foreach($users as $user)
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre Completo</strong>&nbsp;:&nbsp;{{$user->nombre}}
					            @endforeach	
					                </div>
					                <div class="form-group col-md-4">
                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$user->tipo_documento}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$user->num_documento}}
                                    </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teléfono</strong>&nbsp;:&nbsp;{{$user->telefono}}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$user->direccion}}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expedido</strong>&nbsp;&nbsp;:&nbsp;{{$user->expedito}}&nbsp;&nbsp;&nbsp;
					                </div>
					                <div class="form-group col-md-4 text-lowercase">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$user->email}}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rol Asignado</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$user->rol}}
					                </div>

					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usuario</strong>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$user->usuario}}
					                </div>

					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Foto</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<img src="{{asset('/imagenes/usuario/'.$user->imagen)}}" id="imagen1" alt="{{ $user->nombre }}" class="img-responsive" width="125px" height="125px">
					                </div>

                                    <div class="form-group col-md-12 text-center no-print">
                                            @if($user->condicion=="1")

                                                <span class="badge badge-success">Activo</span>

                                              @else

                                                 <span class="badge badge-danger">Desactivado</span>
                                                 
                                            @endif
                                    </div>
					        </div>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="print()" class="btn btn-warning btn-sm no-print">
                            <i class="fa fa-print"></i>&nbsp;Imprimir
                    </button>    
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