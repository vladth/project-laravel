@extends('layouts.app')
@section("title","Productos")
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
        <h2 class="content-heading">ADMINISTRACION DE PRODUCTOS</h2>
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <span>Producto no registrado revise el formulario y llene el formulario nuevamente.</span>
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
    </div>
            <div class="container-fluid">
                <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Tabla de Productos <small> Registrados</small></h3>


                            @if(Auth::check())
                                @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2)
                                    <div class="pull-right">
                                        <a href="{{url('listarProductoPdf')}}" target="_blank">
                                            <button class="btn btn-warning" type="button">
                                                <i class="fa fa-print mr-5"></i>&nbsp;&nbsp;Reporte PDF
                                            </button>
                                        </a>
                                    </div>&nbsp;&nbsp;
                                    <div class="pull-right">
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#abrirmodal">
                                            <i class="fa fa-plus mr-5"></i>&nbsp;&nbsp;Crear Nuevo Producto
                                        </button>
                                    </div>
                                @else
                                    
                                @endif

                            @endif
                        </div>
                        <div class="block-content block-content-full">

                            
                            <table id="config" class="table table-bordered  display nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nº</th>
                                        <th>Categoria</th>
                                        <th>Producto</th>
                                        <th>Codigo</th>
                                        <th>Descuento %</th>
                                        <th>P. V. C/U</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                        <th class="text-center" style="width:100px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $prod)
                                    <tr>
                                        <td class="text-center">{{ ++$cont }}</td>
                                        <td class="font-w600">{{ $prod->categoria }}</td>
                                        <td>{{ $prod->nombre }}</td>
                                        <td>{{ $prod->codigo }}</td>
                                        <td>{{ $prod->descuento }}</td>
                                        <td class="text-rigth">Bs.&nbsp;{{ $prod->precio_venta }}</td>
                                        @if($prod->stock > 5)
                                        <td class="text-center"><span class="badge badge-success">{{ $prod->stock }}</span></td>
                                        @else
                                        <td class="text-center"><span class="badge badge-danger">{{ $prod->stock }}</span></td>
                                        @endif
                                        <td class="text-center">
                                            <img src="{{asset('/imagenes/producto/'.$prod->imagen)}}" id="imagen1" alt="{{$prod->nombre}}" class="img-responsive" width="80px" height="80px">
                                        </td>
                                        <td class="text-center">
                                            @if($prod->condicion=="1")

                                                <span class="badge badge-success">Activo</span>

                                              @else

                                                 <span class="badge badge-danger">Desactivado</span>
                                                 
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            <a href="{{URL::action('ProductoController@show',$prod->id)}}">
                                               <button type="button" class="btn btn-sm btn-info" title="Ver">
                                                 <i class="fa fa-eye"></i>
                                               </button>
                                            </a>
                                @if(Auth::check())
                                    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2)
                                            <button type="button" class="btn btn-primary btn-sm" data-id_producto="{{$prod->id}}" data-id_categoria="{{$prod->idcategoria}}" data-codigo="{{$prod->codigo}}" data-stock="{{$prod->stock}}" data-nombre="{{$prod->nombre}}" data-descripcion="{{$prod->descripcion}}" data-precio_venta="{{$prod->precio_venta}}" data-descuento="{{$prod->descuento}}"  data-toggle="modal" data-target="#abrirmodalEditar" title="Editar">
                                              <i class="fa fa-pencil"></i>
                                            </button>
                                
                                            @if($prod->condicion)

                                                <button type="button" class="btn btn-danger btn-sm" data-id_producto="{{$prod->id}}" data-toggle="modal" data-target="#cambiarEstado" title="Desactivar">
                                                    <i class="fa fa-times"></i>
                                                </button>

                                                @else

                                                 <button type="button" class="btn btn-success btn-sm" data-id_producto="{{$prod->id}}" data-toggle="modal" data-target="#cambiarEstado" title="Activar">
                                                    <i class="fa fa-check"></i> 
                                                </button>

                                            @endif
                                    @else                                
                                    @endif
                                @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $productos->render() }}
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->
            </div>


            <!--Inicio del modal agregar-->
            <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header block-header block-header-default">
                            <h3 class="modal-title block-title">Crear Nuevo <small> Producto</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('producto.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                               
                                {{csrf_field()}}
                                
                                @include('producto.form')

                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->


             <!--Inicio del modal actualizar-->
             <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header block-header block-header-default">
                            <h3 class="modal-title block-title">Actualizar <small> Producto</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('producto.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                {{method_field('patch')}}
                                {{csrf_field()}}

                                <input type="hidden" id="id_producto" name="id_producto" value="">
                                
                                @include('producto.form')

                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->


             <!--Inicio del modal Cambiar Estado-->
             <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header block-header block-header-default">
                            <h3 class="modal-title block-title">Cambiar el Estado del <small> Producto</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('producto.destroy','test')}}" method="post" class="form-horizontal">
                                
                                {{method_field('delete')}}
                                {{csrf_field()}}

                                <input type="hidden" id="id_producto" name="id_producto" value="">
                                
                                <center><span><h1 class="block-title">Estas seguro de cambiar el estado?<br></h1></span></center>
        
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-lock"></i>&nbsp;Aceptar</button>
                                </div>


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
@section("scripts")
        <!-- Page JS Plugins -->

    <script type="text/javascript" src="{{ asset('dev/datatables.min.js') }}"></script>

    <script src="{{ asset('dev/dataTables.responsive.min.js') }}"></script>
@endsection