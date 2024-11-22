@extends('layouts.app')
@section("title","Compras")
@section('content')
<!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 4)

    <div class="col-lg-12 ">         
        <h2 class="content-heading">ADMINISTRAR NUEVAS COMPRAS</h2>
    </div>
        <div class="container-fluid">
            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Tabla de Registro de <small> Compras</small></h3>
                    <a href="{{ url('compra') }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                    </a>
                </div>
                <div class="col-lg-12 ">

                @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <span>Compra no efectuado, Asegúrese de llenar los datos correctamente.</span>
                    </div>
                @endif

                <span><strong><h7><small>Nota: Todos los campos con (*) son obligatorios</small></h7></strong></span>       
                </div>
                    <div class="block-content tab-content">
                        <div class="tab-pane active">
                            <div class="card-body">
                                <div class="modal-body">
                                    <form action="{{route('compra.store')}}" method="POST">
                                    {{csrf_field()}}
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    
                                                  <label class="form-control-label" for="num_compra">Número de Compra (*)</label>
                                                        @foreach($contar as $numeros)
                                                          <input type="text" id="num_compra" name="num_compra" class="form-control"  required disabled value="{{$numeros->numero}}">
                                                        @endforeach 
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label" for="tipo_identificacion">Documento (*)</label>
                                                        
                                                        <select class="js-select2 form-control" name="tipo_identificacion" id="tipo_identificacion" style="width: 100%;" data-placeholder=" SELECCIONE" required>
                                                                                        
                                                            <option></option>
                                                            <option value="FACTURA">FACTURA</option>
                                                            <option value="RECIBO">RECIBO</option>
                                                  
                                                        </select>
                                                        <div class="text-danger">
                                                            {!!$errors->first('tipo_identificacion','<span class="help-block">:message</span>')!!}
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    
                                                  <label class="form-control-label" for="nombre">Nombre del Proveedor (*)</label>
                                                
                                                    <select class="js-select2 form-control" name="id_proveedor" id="id_proveedor" style="width: 100%;" data-placeholder=" SELECCIONE" required>
                                                                                    
                                                    <option></option>
                                                    
                                                    @foreach($proveedores as $prove)
      
                                                         <option value="{{$prove->id}}">{{$prove->nombre}}</option>
                                                       
                                                    @endforeach
                                                    
                                                    </select>

                                                    <div class="text-danger">
                                                          {!!$errors->first('id_proveedor','<span class="help-block">:message</span>')!!}
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label" for="nombre">Producto (*)</label>

                                                      <select class="js-select2 form-control" name="id_producto" id="id_producto" style="width: 100%;" data-placeholder=" SELECCIONE">

                                                          <option></option>
                                                            
                                                          @foreach($productos as $prod)
                                                            
                                                          <option value="{{$prod->id}}">{{$prod->producto}}</option>
                                                                    
                                                          @endforeach

                                                      </select>
                                                      <div class="text-danger">
                                                          {!!$errors->first('id_producto','<span class="help-block">:message</span>')!!}
                                                    </div>
                                                </div>
                                              
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label" for="cantidad">Cantidad (*)</label>
                                                        
                                                        <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad"  pattern="[0-9]{0,100}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-control-label" for="precio_compra">Precio de Compra por Unidad (*)</label>
                                                        
                                                        <input type="number" id="precio_compra" name="precio_compra" class="form-control" placeholder="Ingrese precio de compra"  pattern="[0-9]{0,200}">
                                                </div>
                                                
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <br>
                                                    <button type="button" id="agregar" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus"></i>&nbsp; Agregar Detalle Compra</button>
                                                </div>
                                            </div>


                                            <br/>

                                            <div class="block col-md-12">
                                                <div class="block-header-default">
                                                    <br>
                                                    <center><h3 class="block-title">&nbsp;&nbsp;DETALLE DE COMPRAS DE LOS DIVERSOS PRODUCTOS</h3></center>
                                                </div>
                                            </div>
                                            <div class="table-responsive col-md-12">
                                                <table id="detalles" class="table table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr class="bg-info">
                                                        <th>Eliminar</th>
                                                        <th>Producto</th>
                                                        <th>Precio (Bs)</th>
                                                        <th>Cantidad</th>
                                                        <th>SubTotal (Bs)</th>
                                                    </tr>
                                                </thead>
                                                 
                                                <tfoot>

                                                    <tr>
                                                        <th  colspan="4"><p align="right">TOTAL:</p></th>
                                                        <th><p align="right"><span id="total">Bs. &nbsp;0.00</span> </p></th>
                                                    </tr>
                                                    <!--
                                                    <tr>
                                                        <th colspan="4"><p align="right">TOTAL IVA (13%):</p></th>
                                                        <th><p align="right"><span id="total_impuesto">Bs. &nbsp;0.00</span></p></th>
                                                    </tr> -->

                                                    <tr>
                                                        <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                                                        <th><p align="right"><span align="right" id="total_pagar_html">Bs. &nbsp;0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                                                    </tr>  

                                                </tfoot>

                                                <tbody>
                                                </tbody>
                                                
                                                
                                                </table>
                                              </div>

                                            
                                            </div>

                                            <div class="modal-footer form-group row" id="guardar">
                                                <div class="form-group col-md-4">    
                                                </div>
                                            
                                                <div class="form-group">
                                                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    
                                                    <button type="submit" class="btn btn-success bt-sm"><i class="fa fa-save"></i>&nbsp;Realizar Compra</button>
                                                
                                                </div>
                                                <div class="form-group col-md-5">
                                                </div>

                                            </div>

                                         </form>
                                </div>
                                <!--<div class="modal-footer">
                                </div>-->
                            </div>
                        </div>
                    </div>
            </div>
            <!-- END Dynamic Table Full -->
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


@push('scripts')
 <script>
     
  $(document).ready(function(){
     
     $("#agregar").click(function(){

         agregar();
     });

  });

   var cont=0;
   total=0;
   subtotal=[];
   $("#guardar").hide();

     function agregar(){

          id_producto= $("#id_producto").val();
          producto= $("#id_producto option:selected").text();
          cantidad= $("#cantidad").val();
          precio_compra= $("#precio_compra").val();
          impuesto=13;
        
          
          if(id_producto !="" && cantidad!="" && cantidad>0 && precio_compra!=""){
            
             subtotal[cont]=cantidad*precio_compra;
             total= total+subtotal[cont];
             
             var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');" title="Eliminar Producto"><i class="fa fa-trash"></i></button></td> <td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td> <td><input type="number" id="precio_compra[]" name="precio_compra[]"  value="'+precio_compra+'"> </td>  <td><input type="number" name="cantidad[]" value="'+cantidad+'"> </td> <td>Bs.&nbsp;'+subtotal[cont]+' </td></tr>';
             cont++;
             limpiar();
             totales();
            
             evaluar();
             $('#detalles').append(fila);
            
            }else{

               // alert("Rellene todos los campos del detalle de la compra, revise los datos del producto");
               
                Swal.fire({
                type: 'error',
                //title: 'Oops...',
                text: 'Rellene todos los campos del detalle de la compras',
              
                })
            
            }
         
     }

    
     function limpiar(){
        
        $("#cantidad").val("");
        $("#precio_compra").val("");
        

     }

     function totales(){

        $("#total").html("Bs. &nbsp; " + total.toFixed(2));

        total_impuesto=total;
        total_pagar=total_impuesto;
        $("#total_impuesto").html("Bs. &nbsp; " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("Bs. &nbsp; " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
        
     }



     function evaluar(){

         if(total>0){

           $("#guardar").show();

         } else{
              
           $("#guardar").hide();
         }
     }

     function eliminar(index){

        total=total-subtotal[index];
        total_impuesto= total;
        total_pagar_html = total;
       
        $("#total").html("Bs. &nbsp;" + total);
        $("#total_impuesto").html("Bs. &nbsp;" + total_impuesto);
        $("#total_pagar_html").html("Bs. &nbsp;" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
       
        $("#fila" + index).remove();
        evaluar();
     }

 </script>

@endpush
  
@endsection