@extends('layouts.app')
@section("title","Categorias")
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
        <h2 class="content-heading">ADMINISTRACION DE CATEGORIAS</h2>
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <span>Categoria no registrado revise el formulario y llene el formulario nuevamente.</span>
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
                            <h3 class="block-title">Tabla de Categorias <small> Registrados</small></h3>
                            <div class="pull-right">
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#abrirmodal">
                                    <i class="fa fa-plus mr-5"></i>&nbsp;&nbsp;Crear Nueva Categoria
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            
                            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table id="config" class="table table-bordered  display nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nº</th>
                                        <th>Nombre</th>
                                        <th style="width:auto;">Descripcion</th>
                                        <th>Fecha Creacion</th>
                                        <th>Fecha Actualiacion</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorias as $cat)
                                    <tr>
                                        <td class="text-center">{{ ++$cont }}</td>
                                        <td class="font-w600">{{ $cat->nombre }}</td>
                                        <td>{{ $cat->descripcion }}</td>
                                        <td>{{ $cat->created_at }}</td>
                                        <td>{{ $cat->updated_at }}</td>
                                        <td class="text-center">
                                            @if($cat->condicion=="1")
                                                <span class="badge badge-success">Activo</span>
                                              @else
                                                 <span class="badge badge-danger">Desactivado</span>
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            <button type="button" class="btn btn-sm btn-primary" data-id_categoria="{{$cat->id}}" data-nombre="{{$cat->nombre}}" data-descripcion="{{$cat->descripcion}}" data-toggle="modal" data-target="#abrirmodalEditar" title="Editar">
                                            <i class="fa fa-pencil"></i>
                                            </button>

                                            @if($cat->condicion)

                                                <button type="button" class="btn btn-sm btn-danger" data-id_categoria="{{$cat->id}}" data-toggle="modal" data-target="#cambiarEstado" title="Desactivar">
                                                    <i class="fa fa-times"></i>
                                                </button>

                                                @else

                                                <button type="button" class="btn btn-success btn-sm" data-id_categoria="{{$cat->id}}" data-toggle="modal" data-target="#cambiarEstado" title="Activar">
                                                    <i class="fa fa-check"></i> 
                                                </button>

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categorias->render() }}
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->
            </div>


            <!--Inicio del modal agregar-->
            <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header block-header block-header-default">
                            <h3 class="modal-title block-title">Crear Nueva <small> Categoria</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>
                       
                        <div class="modal-body">

                            <form action="{{route('categoria.store')}}" method="post" class="form-horizontal">
                               
                                {{csrf_field()}}
                                
                                @include('categoria.form')

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
                            <h3 class="modal-title block-title">Actualizar Datos de la <small> Categoria</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('categoria.update','test')}}" method="post" class="form-horizontal">
                                
                                {{method_field('patch')}}
                                {{csrf_field()}}

                                <input type="hidden" id="id_categoria" name="id_categoria" value="">
                                
                                @include('categoria.form')

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
                            <h3 class="modal-title block-title">Cambiar El Estado la <small> Categoria</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('categoria.destroy','test')}}" method="post" class="form-horizontal">
                                
                                {{method_field('delete')}}
                                {{csrf_field()}}

                                <input type="hidden" id="id_categoria" name="id_categoria" value="">
                                
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