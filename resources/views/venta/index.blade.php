@extends('layouts.app')
@section("title","Ventas")
@section("styles")
    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dev/datatables.min.css') }}">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dev/responsive.dataTables.min.css') }}">
@endsection
@section('content')
    <!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 4)
    <div class="col-lg-12 ">         
        <h2 class="content-heading">ADMINISTRACION DE VENTAS</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
           </button>
             <p>{{ $message }}</p>
        </div>
        @endif
    </div>
          <div class="container-fluid">
                <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Tabla de Ventas Registradas</h3>
                            <div class="pull-right">
                              @if(Auth::check())
                                  @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2)
                                <a href="{{url('factura')}}">
                                    <button class="btn btn-info" type="button" data-toggle="modal" data-target="#abrirmodal">
                                        <i class="fa fa-print mr-5"></i>&nbsp;&nbsp;Facturas Anulados
                                    </button>
                                </a>
                                 @endif
                              @endif
                                <a href="venta/create">
                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#abrirmodal">
                                        <i class="fa fa-plus mr-5"></i>&nbsp;&nbsp;Nueva Venta
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            
                            <table id="config" class="table table-bordered  display nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nº</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Nº Venta</th>
                                        
                                        <th class="text-center">Total</th>
                                        <th>Vendedor</th>
                                        <th>Estado</th>
                                        <th class="text-center" style="width:100px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ventas as $vent)
                                    <tr>
                                        <td class="text-center">{{ ++$cont }}</td>
                                        <td class="font-w600">{{$vent->fecha_venta->formatLocalized('%d de %B %Y')}}</td>
                                        <td>{{ $vent->cliente }}</td>
                                        <td class="text-right">{{ $vent->num_venta }}</td>
                                        
                                        <td>Bs.&nbsp;{{ number_format($vent->total,2) }}</td>
                                        <td>{{ $vent->nombre }}</td>
                                        <td class="text-center">

                                           @if($vent->estado=="Registrado")
                                              
                                              <span class="badge badge-success">Registrado</span>

                                            @else

                                              <span class="badge badge-danger">Anulado</span>

                                            @endif

                                        </td>
                                        <td class="text-center">
                                          
                                            <a href="{{URL::action('VentaController@show',$vent->id)}}">
                                               <button type="button" class="btn btn-sm btn-info" title="Detalles">
                                                 <i class="fa fa-file-text-o"></i>
                                               </button>
                                            </a>

                                            @if($vent->estado=="Registrado")

                                              <button type="button" class="btn btn-danger btn-sm" data-id_venta="{{$vent->id}}" data-toggle="modal" data-target="#cambiarEstadoVenta" title="Anular Venta">
                                                  <i class="fa fa-times"></i> 
                                              </button>

                                              @else

                                               <button type="button" class="btn btn-success btn-sm" title="Anulado">
                                                  <i class="fa fa-lock"></i>
                                              </button>

                                            @endif

                                             <a href="{{url('pdfVenta',$vent->id)}}" target="_blank">
                                                 <button type="button" class="btn btn-warning btn-sm" title="FACTURAR">
                                                   <i class="fa fa-print"></i>
                                                 </button> &nbsp;
                                             </a> 

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $ventas->render() }}
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->
            </div>



        <!-- Inicio del modal cambiar estado de venta -->
         <div class="modal fade" id="cambiarEstadoVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header block-header block-header-default">
                            <h3 class="modal-title block-title">Cambiar el Estado de la <small> Venta</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>

                    <div class="modal-body">
                        <form action="{{route('venta.destroy','test')}}" method="POST">
                          {{method_field('delete')}}
                          {{csrf_field()}} 

                            <input type="hidden" id="id_venta" name="id_venta" value="">

                                <center><span><h1 class="block-title">Estas seguro de anular la Venta?<br></h1></span></center>
        

                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-lock"></i>&nbsp;Aceptar</button>
                            </div>

                         </form>
                    </div>
                    <!-- /.modal-content -->
                   </div>
                <!-- /.modal-dialog -->
             </div>
            <!-- Fin del modal Eliminar -->
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