@extends('layouts.app')
@section("title","Vista Producto")
@section('content')
<!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 4)
    <div class="col-lg-12 ">         
        <h2 class="content-heading">ADMINISTRACION - VISTA DE PRODUCTO</h2>
    </div>
    <div class="container-fluid">
            <!-- Dynamic Table Full -->
            <div class="block">
            	<div class="block-header block-header-default">
            		@foreach($producto as $prod)
                    <h3 class="block-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Tabla del Detalle del <small>Producto, la Fecha Actualización&nbsp;{{ $prod->updated_at }}</small></h3>
                    @endforeach
                    <a href="{{ url('producto') }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                    </a>

                </div>
                <br>
                <div class="col-lg-12 text-uppercase">
                    <center><span><h2 class="block-title" style="text-decoration: underline;">Detalle del Producto<br></h2></span></center>
                </div>
                <br>
                <div class="col-lg-12">
                    <div class="form-row">
                    	<div class="form-group col-md-12 text-capitalize">
                    		<div class="form-row">
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categoria</strong>&nbsp;&nbsp;&nbsp;@foreach($categorias as $cat)
					                		@if($prod->idcategoria == $cat->id )
					                		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$cat->nombre}}
					                		@endif
					                		@endforeach
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Codigo</strong>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$prod->codigo}}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$prod->created_at}}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Producto</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$prod->nombre}}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stock&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$prod->stock}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Descuento</strong>&nbsp;&nbsp;&nbsp;:&nbsp;{{$prod->descuento}}&nbsp;&nbsp;%
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Precio de Venta</strong>&nbsp;&nbsp;:&nbsp;&nbsp;Bs.&nbsp;{{$prod->precio_venta}}
					                </div>
					                <div class="form-group col-md-8">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Descripción</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$prod->descripcion}}
					                </div>
					                <div class="form-group col-md-4">
					                		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Imagen</strong>&nbsp;&nbsp;:&nbsp;&nbsp;<img src="{{asset('/imagenes/producto/'.$prod->imagen)}}" id="imagen1" alt="{{$prod->nombre}}" class="img-responsive" width="250px" height="150px">
					                </div>

                                    <div class="form-group col-md-12 text-center">
                                            @if($prod->condicion=="1")

                                                <span class="badge badge-success">Activo</span>

                                              @else

                                                 <span class="badge badge-danger">Desactivado</span>
                                                 
                                            @endif
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