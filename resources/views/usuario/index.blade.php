@extends('layouts.app')
@section("title","Perfil de Usuario")
@section('content')
<!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 3 or Auth::user()->idrol == 4)
    <div class="col-lg-12 no-print">         
        <h2 class="content-heading text-capitalize">Bienvenido,&nbsp;{{ auth()->user()->nombre }}</h2>
    </div>

    <div class="container-fluid">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <span>Foto de perfil no actualizado.</span>
            </div>
        @endif
       @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button>
             <p>{{ $message }}</p>
        </div>
        @endif
            <!-- Dynamic Table Full -->
            <div class="block">
            	<div class="block-header block-header-default no-print">
                    <h3 class="block-title"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;Gestiona tu información, privacidad y <small> Seguridad.</small></h3>
                    <a href="{{ url('home') }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                    </a>

                </div>
                <br>
                <div class="col-lg-12 text-uppercase">
                    <center><span><h2 class="block-title" >Datos del Usuario<br></h2></span></center>
                </div>
                <br>
                <div class="col-lg-12">
                    <div class="form-row">
                    	<div class="form-group col-md-12 text-capitalize">
                    		
                    		<div class="form-row">
                                
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre Completo</strong>&nbsp;:&nbsp;{{ auth()->user()->nombre }}
					            
					                </div>
					                <div class="form-group col-md-4">
                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ auth()->user()->tipo_documento }}</strong>&nbsp;&nbsp;&nbsp;:&nbsp;{{ auth()->user()->num_documento }}
                                    </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teléfono</strong>&nbsp;:&nbsp;{{ auth()->user()->telefono }}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{ auth()->user()->direccion }}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<span class="text-lowercase">{{ auth()->user()->email }}</span>
					                </div>
					                <div class="form-group col-md-4 text-lowercase">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-link" title="Editar foto" type="button" data-toggle="modal" data-target="#abrirmodalEditar"><img src="{{asset('imagenes/usuario/'.Auth::user()->imagen)}}" id="imagen1" alt="{{ auth()->user()->nombre }}" class="img-responsive" width="125px" height="125px">
                                            </button>

					                </div>
					                <div class="form-group col-md-4">
					                		
					                </div>

					                <div class="form-group col-md-4">
					                		
					                </div>

					                <div class="form-group col-md-4">
					                	
					                </div>

					        </div>

                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{url('usuario/password')}}" class="btn btn-success">
                        <i class="fa fa-unlock-alt mr-5"></i>&nbsp;&nbsp;Cambiar contraseña
                    </a>  
                </div>
            </div>
    </div>


             <!--Inicio del modal actualizar-->
             <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header block-header block-header-default">
                            <h3 class="modal-title block-title">Actualizar Foto <small> Perfil</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{url('usuario/updateprofile')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                
                                @include('usuario.perfil')

                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->

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