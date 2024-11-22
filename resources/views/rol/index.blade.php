@extends('layouts.app')
@section("title","Roles")
@section("styles")
    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dev/datatables.min.css') }}">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dev/responsive.dataTables.min.css') }}">
@endsection
@section('content')
    <!-- Contenido html -->
    <div class="col-lg-12 ">         
        <h2 class="content-heading">ADMINISTRACION DE ROLES DISPONIBLES</h2>
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
                            <h3 class="block-title">Tabla de Roles <small> Registrados</small></h3>

                        </div>
                        <div class="block-content block-content-full">
                            
                            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table id="config" class="table table-bordered  display nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nº</th>
                                        <th class="text-center">Rol</th>
                                        <th>Descripcion</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center" style="width:100px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $rol)
                                    <tr>
                                        <td class="text-center">{{ ++$cont }}</td>
                                        <td class="font-w600">{{ $rol->nombre }}</td>
                                        <td>{{ $rol->descripcion }}</td>
                                        <td class="text-center">

                                            @if($rol->condicion=="1")
                                                <span class="badge badge-success">Activo</span>
                                              @else
                                                 <span class="badge badge-danger">Desactivado</span>
                                            @endif

                                        </td>
                                        <td class="text-center">


                                            @if($rol->condicion)

                                                <button type="button" class="btn btn-danger btn-sm" data-id_rol="{{$rol->id}}" data-toggle="modal" data-target="#cambiarEstadoRol" title="Desactivar">
                                                    <i class="fa fa-times"></i>
                                                </button>

                                                @else

                                                 <button type="button" class="btn btn-success btn-sm" data-id_rol="{{$rol->id}}" data-toggle="modal" data-target="#cambiarEstadoRol" title="Activar">
                                                    <i class="fa fa-check"></i> 
                                                </button>

                                             @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $roles->render() }}
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->
            </div>




            <!--Inicio del modal Cambiar Estado-->
             <div class="modal fade" id="cambiarEstadoRol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header block-header block-header-default">
                            <h3 class="modal-title block-title">Cambiar el Estado del <small> Rol</small></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('rol.destroy','test')}}" method="post" class="form-horizontal">
                                
                                {{method_field('delete')}}
                                {{csrf_field()}}

                                <input type="hidden" id="id_rol" name="id_rol" value="">
                                
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



@endsection
@section("scripts")
    <!-- Page JS Plugins -->

    <script type="text/javascript" src="{{ asset('dev/datatables.min.js') }}"></script>

    <script src="{{ asset('dev/dataTables.responsive.min.js') }}"></script>
@endsection