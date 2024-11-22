@extends('layouts.app')
@section("title","Cambiar contraseña")
@section('content')
<!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 3 or Auth::user()->idrol == 4)
    <div class="col-lg-12 no-print">         
        <h2 class="content-heading">Bienvenido,&nbsp;{{ auth()->user()->nombre }}</h2>
    </div>

    <div class="container-fluid">
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <span>La contraseña no fue actualizada, asegúrese de ingresar los datos correctamente.</span>
            </div>
       @endif

       @if (Session::has('message'))
            <div class="text-danger">
              {{Session::get('message')}}
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
                    <h3 class="block-title"><i class="fa fa-unlock-alt mr-5"></i>&nbsp;&nbsp;Actualizar <small> contraseña.</small></h3>
                    <a href="{{ url('usuario') }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                    </a>

                </div>

                <div class="col-lg-12 ">
                <span><strong><h7><small>Nota: Al actualizar su contraseña con éxito será automáticamente redireccionado al login y deberá iniciar sesión con su nueva contraseña.</small></h7></strong></span>       
                </div>
                <br>
                <div class="col-lg-12">
                    <div class="form-row">
                    	<div class="form-group col-md-12">
                  
                    		<div class="form-row">
                            
					                <div class="form-group col-md-3">
					                		
					                </div>

					                <div class="form-group col-md-6">
					                		<form method="post" action="{{url('usuario/updatepassword')}}">
												 {{csrf_field()}}
												 <div class="form-group">
												  <label for="mypassword">Contraseña actual:</label>
												  <input type="password" value="{{old('mypassword')}}" name="mypassword" class="form-control" required>
												  <div class="text-danger">
							                        {!!$errors->first('mypassword','<span class="help-block">:message</span>')!!}
							                     </div>
							                        @if ($message = Session::get('confirError'))
											        <div class="text-danger">
											        	<span class="help-block">{{ $message }}</span>
											        </div>
											        @endif
												 </div>
												 <div class="form-group">
												  <label for="password">Nueva contraseña:</label>
												  <input type="password" name="password" class="form-control" required>
												  <div class="text-danger">
								                        {!!$errors->first('password','<span class="help-block">:message</span>')!!}
								                   </div>
												 </div>
												 <div class="form-group">
												  <label for="mypassword">Confirma contraseña:</label>
												  <input type="password" name="password_confirmation" class="form-control" required>
												 </div>
												 <div class="modal-footer">
												 <button type="submit" class="btn btn-primary "><i class="fa fa-unlock-alt mr-5"></i>&nbsp;&nbsp;Cambiar contraseña</button>
												 </div>
											</form>
					                </div>

					                <div class="form-group col-md-3">
					                	
					                </div>

					        </div>

                        </div> 
                    </div>
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