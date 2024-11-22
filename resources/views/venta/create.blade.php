@extends('layouts.app')
@section("title","Ventas")
@section('content')
<!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 4)
    <div class="col-lg-12 ">         
        <h2 class="content-heading">ADMINISTRAR NUEVAS VENTAS</h2>
    </div>
    <div class="container-fluid">
            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Tabla de Registro de <small> Ventas</small></h3>
                    <a href="{{ url('venta') }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                        </button>
                    </a>
                </div>
                <div class="col-lg-12 "> 

                @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <span>Venta no fue efectuado, Asegúrese de llenar los datos correctamente.</span>
                    </div>
                @endif

                <span><strong><h7><small>Nota: Todos los campos con (*) son obligatorios</small></h7></strong></span>       
                </div>
                <div class="block-content tab-content">
                        <div class="tab-pane active">
                            <div class="card-body">
                                <div class="modal-body">

                                    <form action="{{route('venta.store')}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                  
                                                <label class="form-control-label" for="num_venta">Número de Venta</label>
                                                        @foreach($contar as $numeros)
                                                        <input type="text" id="num_venta" name="num_venta" class="form-control"  required disabled value="{{$numeros->numero}}">
                                                        @endforeach
                                             </div>
                                             <div class="form-group col-md-6">
                                                    <label class="form-control-label" for="documento">Documento (*)</label>
                                                        
                                                        <select class="js-select2 form-control" name="tipo_identificacion" id="tipo_identificacion" style="width: 100%;" data-placeholder=" SELECCIONE" required>
                                                            <option></option>
                                                            <option value="FACTURA">FACTURA</option>
                                                        </select>
                                                        <div class="text-danger">
                                                            {!!$errors->first('tipo_identificacion','<span class="help-block">:message</span>')!!}
                                                        </div>
                                             </div>
                                        </div>


                                        <div class="form-row">
                                             <div class="form-group col-md-6">
                                                <label class="form-control-label" for="nombre">Nombre del Cliente (*)</label>
                                                
                                                    <select class="js-select2 form-control" name="id_cliente" id="id_cliente" style="width: 100%;" data-placeholder=" SELECCIONE" required>
                                                                                    
                                                    <option></option>
                                                    
                                                    @foreach($clientes as $client)
                                                    
                                                    <option value="{{$client->id}}">{{$client->nombre}}</option>
                                                            
                                                    @endforeach

                                                    </select>

                                                    <div class="text-danger">
                                                        {!!$errors->first('id_cliente','<span class="help-block">:message</span>')!!}
                                                    </div>

                                             </div>
                                             <div class="form-group col-md-6">
                                                    <label class="form-control-label" for="nombre">Producto (*)</label>

                                                            <select class="js-select2 form-control selectpicker" name="id_producto" id="id_producto" style="width: 100%;" data-placeholder=" SELECCIONE">
                                                                                            
                                                            <option></option>
                                                            
                                                            @foreach($productos as $prod)
                                                            
                                                            <option value="{{$prod->id}}_{{$prod->stock}}_{{$prod->precio_venta}}_{{$prod->descuento}}">{{$prod->producto}}</option>
                                                                    
                                                            @endforeach

                                                            </select>
                                             </div>
                                        </div>


                                        <div class="form-row">
                                             <div class="form-group col-md-3">
                                                <label class="form-control-label" for="cantidad">Cantidad (*)</label>
                                                        
                                                        <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,100}">
                                             </div>
                                             <div class="form-group col-md-3">
                                                <label class="form-control-label" for="stock">Stock</label>
                                                        
                                                        <input type="number" disabled id="stock" name="stock" class="form-control" placeholder="Ingrese el stock" pattern="[0-9]{0,100}">
                                             </div>
                                             <div class="form-group col-md-3">
                                                <label class="form-control-label" for="precio_venta">Precio Venta</label>
                                                        
                                                        <input type="number" disabled id="precio_venta" name="precio_venta" class="form-control" placeholder="Ingrese precio de venta" >
                                             </div>
                                             <div class="form-group col-md-3">
                                                    <label class="form-control-label" for="descuento">Descuento en %</label>
                                                        
                                                        <input type="number" id="descuento" name="descuento" class="form-control" placeholder="Ingrese el descuento">
                                             </div>
                                        </div>

                                        <div class="form-row">
                                             <div class="form-group col-md-6">

                                             </div>
                                             <div class="form-group col-md-6">
                                                <button type="button" id="agregar" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus"></i>&nbsp;Agregar Detalle Venta</button>
                                             </div>
                                        </div>
                                        <br/>

                                            <div class="block col-md-12">
                                                <div class="block-header-default">
                                                    <br>
                                                    <center><h3 class="block-title">&nbsp;&nbsp;DETALLE DE VENTA DE LOS DIVERSOS PRODUCTOS</h3></center>
                                                </div>
                                            </div>
                                            <div class="table-responsive col-md-12">
                                                <table id="detalles" class="table table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr class="bg-info">
                                                        <th>Eliminar</th>
                                                        <th>Producto</th>
                                                        <th>Precio Venta (Bs.)</th>
                                                        <th>Descuento</th>
                                                        <th>Cantidad</th>
                                                        <th>SubTotal (Bs.)</th>
                                                    </tr>
                                                </thead>
                                                 
                                                <tfoot>

                                                    <tr>
                                                        <th  colspan="5"><p align="right">TOTAL</p></th>
                                                        <th><p align="right"><span id="total">Bs.&nbsp; 0.00</span> </p></th>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="5"><p align="right">MONTO A PAGAR</p></th>
                                                        <th><p align="right"><span id="total_impuesto">Bs.&nbsp; 0.00</span></p></th>
                                                    </tr>

                                                    <tr>
                                                        <th  colspan="5"><p align="right">IMPORTE BASE CRÉDITO FISCAL</p></th>
                                                        <th><p align="right"><span align="right" id="total_pagar_html">Bs.&nbsp; 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                                                    </tr>  

                                                </tfoot>

                                                <tbody>
                                                </tbody>
                                                
                                                
                                                </table>
                                              </div>


                                           <div class="modal-footer form-group row" id="guardar">
                                                 <div class="form-group col-md-4">    
                                                 </div>
                                                     <div class="form-group">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">                               
                                                        <button type="submit" class="btn btn-success bt-sm"><i class="fa fa-save"></i>&nbsp;Realizar Venta</button>
                                                     </div>
                                                 <div class="form-group col-md-5">
                                                 </div>
                                            </div>

                                         </form>

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
   $("#id_producto").change(mostrarValores);

     function mostrarValores(){

         datosProducto = document.getElementById('id_producto').value.split('_');
         $("#descuento").val(datosProducto[3]);
         $("#precio_venta").val(datosProducto[2]);
         $("#stock").val(datosProducto[1]);
     
     }

     function agregar(){

         datosProducto = document.getElementById('id_producto').value.split('_');

         id_producto= datosProducto[0];
         producto= $("#id_producto option:selected").text();
         cantidad= $("#cantidad").val();
         descuento= $("#descuento").val();
         precio_venta= $("#precio_venta").val();
         stock= $("#stock").val();
         impuesto=16;
          
          if(id_producto !="" && cantidad!="" && cantidad>0  && descuento!="" && precio_venta!=""){

                if(parseInt(stock)>=parseInt(cantidad)){
                    
                    /*subtotal[cont]=(cantidad*precio_venta)-descuento;
                    total= total+subtotal[cont];*/

                    subtotal[cont]=(cantidad*precio_venta)-(cantidad*precio_venta*descuento/100);
                    total= total+subtotal[cont];

                    var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');" title="Eliminar Producto"><i class="fa fa-trash"></i></button></td> <td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td> <td><input type="number" name="precio_venta[]" value="'+parseFloat(precio_venta).toFixed(2)+'"> </td> <td><input type="number" name="descuento[]" value="'+parseFloat(descuento).toFixed(2)+'"> </td> <td><input type="number" name="cantidad[]" value="'+cantidad+'"> </td> <td>Bs.&nbsp;'+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                       
                    evaluar();
                    $('#detalles').append(fila);

                } else{

         
                    Swal.fire({
                    type: 'error',
                   
                    text: 'La cantidad a vender supera el stock',
                
                    })
                }
               
            }else{

           
                Swal.fire({
                type: 'error',
               
                text: 'Rellene todos los campos del detalle de la venta',
              
                })
           
            }
         
     }

      
     function limpiar(){
        
        $("#cantidad").val("");
        $("#descuento").val("0");
        $("#precio_venta").val("");
        $("#id_producto").val("");

     }

     function totales(){

        $("#total").html("Bs.&nbsp; " + total.toFixed(2));
        //$("#total_venta").val(total.toFixed(2));

        total_impuesto=total;
        total_pagar=total_impuesto;
        $("#total_impuesto").html("Bs.&nbsp; " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("Bs.&nbsp; " + total_pagar.toFixed(2));
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
        total_impuesto= total*16/100;
        total_pagar_html = total + total_impuesto;

        $("#total").html("Bs.&nbsp;" + total);
        $("#total_impuesto").html("Bs.&nbsp;" + total_impuesto);
        $("#total_pagar_html").html("Bs.&nbsp;" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        
        $("#fila" + index).remove();
        evaluar();
     }

 </script>
@endpush

@endsection