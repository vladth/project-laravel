@extends('layouts.app')
@section("title","Compras")
@section('content')
    <!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 4)
    <div class="col-lg-12 ">         
        <h2 class="content-heading">ADMINISTRACION DE VISTA DE DETALLE</h2>
    </div>
        <div class="container-fluid">
            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Tabla del Detalle de <small> Compras de la Fecha &nbsp;{{ $compra->created_at }}</small></h3>
                    <a href="{{ url('compra') }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                    </a>
                </div>
                <br>
                <div class="col-lg-12 text-uppercase">
                    <center><span><h2 class="block-title" style="text-decoration: underline;">DETALLE DE COMPRAS<br></h2></span></center>
                </div>
                <br>
                <div class="col-lg-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de Proveedor</strong>&nbsp;:&nbsp;{{$compra->nombre}}
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha</strong>&nbsp;&nbsp;&nbsp;:&nbsp;{{$compra->created_at->formatLocalized('%d de %B %Y')}}
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$compra->tipo_identificacion}}</strong>&nbsp;&nbsp;:&nbsp;{{$compra->num_compra}}
                          </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teléfono/Celular</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$compra->telefono}}
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo</strong>&nbsp;:&nbsp;{{$compra->email}}
                        </div>
                        <div class="form-group col-md-4">
                              @if($compra->estado=="Anulado")

                                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<span class="badge badge-danger">{{$compra->estado}}</span>

                              @else

                                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<span class="badge badge-success">{{$compra->estado}}</span>
                                                 
                               @endif
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$compra->direccion}}
                        </div>
                        <div class="form-group col-md-4">
                              
                        </div>
                        <div class="form-group col-md-4">
                              
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comprador</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$compra->user}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                  <div class="table-responsive col-md-12">
                <table id="detalles" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr class="bg-info">

                        <th>Producto</th>
                        <th class="text-right">Precio (Bs.)</th>
                        <th class="text-right">Cantidad</th>
                        <th class="text-right">SubTotal (Bs.)</th>
                    </tr>
                </thead>
                 
                <tfoot>


                    <tr>
                        <th  colspan="3"><p align="right">TOTAL</p></th>
                        <th><p align="right">Bs.&nbsp;{{number_format($compra->total,2)}}</p></th>
                    </tr>
                    <!--
                    <tr>
                        <th colspan="3"><p align="right">IVA (13%):</p></th>
                        <th><p align="right">Bs.&nbsp;{{number_format($compra->total*13/100,2)}}</p></th>
                    </tr> -->

                    <tr>
                        <th  colspan="3"><p align="right">TOTAL PAGAR</p></th>
                        <th><p align="right">Bs.&nbsp;{{number_format($compra->total,2)}}</p></th>
                    </tr> 

                </tfoot>

                <tbody>
                   
                   @foreach($detalles as $det)

                    <tr>
                     
                      <td>{{$det->producto}}</td>
                      <td class="text-right">Bs.&nbsp;{{$det->precio}}</td>
                      <td class="text-right">{{$det->cantidad}}</td>
                      <td class="text-right">Bs.&nbsp;{{number_format($det->cantidad*$det->precio,2)}}</td>
                    
                    </tr> 

                   @endforeach
                   
                </tbody>
                </table>
                <div class="modal-footer">
                    <a href="{{url('pdfCompra',$compra->id)}}" target="_blank">
                        <button type="button" class="btn btn-warning btn-sm">
                            <i class="fa fa-print"></i>&nbsp;Imprimir
                        </button>
                    </a>    
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