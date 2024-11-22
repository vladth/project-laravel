@extends('layouts.app')
@section("title","Ventas")
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
                    <h3 class="block-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Tabla del Detalle de la <small> Venta&nbsp;</small></h3>
                    <a href="{{ url('venta') }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                    </a>
                </div>
                <br>
                <div class="col-lg-12 ">
                    <center><span><h1 class="block-title text-uppercase" style="text-decoration: underline;">Detalle de la Venta<br></h2></span></center>
                </div>
                <br>
                <div class="col-lg-12 ">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cliente</strong>&nbsp;&nbsp;:&nbsp;{{$venta->nombre}}
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$venta->tipo_documento}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$venta->num_documento}}
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$venta->tipo_identificacion}}</strong>&nbsp;&nbsp;&nbsp;:&nbsp;{{$venta->num_venta}}
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha</strong>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$venta->fecha_venta->formatLocalized('%d de %B %Y')}}
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expedido</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$venta->expedito}}
                        </div>
                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teléfono</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$venta->telefono}}
                        </div>

                        <div class="form-group col-md-4">
                              @if($venta->estado=="Anulado")

                                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado</strong>&nbsp;&nbsp;:&nbsp;<span class="badge badge-danger">{{$venta->estado}}</span>

                              @else

                                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado</strong>&nbsp;&nbsp;:&nbsp;<span class="badge badge-success">{{$venta->estado}}</span>
                                                 
                               @endif
                              
                        </div>

                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Autorización</strong>&nbsp;:&nbsp;{{$venta->autorizacion}}
                        </div>

                        <div class="form-group col-md-4">
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QR</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<img src="{{asset('/'.$venta->venta_qr)}}" id="imagen1" alt="{{ $venta->num_venta }}" class="img-responsive" width="125px" height="125px">
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                  <div class="table-responsive col-md-12">
                      <table id="detalles" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr class="bg-info">

                        <th>Producto</th>
                        <th class="text-right">Precio Venta (Bs.)</th>
                        <th class="text-right">Descuento (%)</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-right">SubTotal (Bs.)</th>
                    </tr>
                </thead>
                 
                <tfoot>

                   <tr>
                        <th  colspan="4"><p align="right">TOTAL</p></th>
                        <th><p align="right">Bs.&nbsp;{{number_format($venta->total,2)}}</p></th>
                    </tr>

                    <tr>
                        <th colspan="4"><p align="right">MONTO A PAGAR</p></th>
                        <th><p align="right">Bs.&nbsp;{{number_format($venta->total,2)}}</p></th>
                    </tr>

                    <tr>
                        <th  colspan="4"><p align="right">IMPORTE BASE CRÉDITO FISCAL</p></th>
                        <th><p align="right">Bs.&nbsp;{{number_format($venta->total,2)}}</p></th>
                    </tr>  
                </tfoot>

                <tbody>
                   
                   @foreach($detalles as $det)

                    <tr>
                     
                      <td>{{$det->producto}}</td>
                      <td class="text-right">Bs.&nbsp;{{$det->precio}}</td>
                      <td class="text-right">{{$det->descuento}}</td>
                      <td class="text-center">{{$det->cantidad}}</td>
                      <td class="text-right">Bs.&nbsp;{{number_format($det->cantidad*$det->precio - $det->cantidad*$det->precio*$det->descuento/100,2)}}</td>
                    
                    </tr> 
                   @endforeach
                   
                </tbody>
                </table>
                <div class="modal-footer">
                    <a href="{{url('pdfVenta',$venta->id)}}" target="_blank">
                         <button type="button" class="btn btn-warning btn-sm" title="Facturar / Recibo PDF">
                            <i class="fa fa-print"></i>&nbsp;Imprimir
                         </button>
                    </a>
                </div>
              </div>
            </div>
</dir>
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