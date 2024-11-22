@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2)
    <style>
        .anulada{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
        }
    </style>
@foreach ($compra as $compras)
@if($compras->estado == 'Anulado')
<img class="anulada" src="media/img/anulado.png" alt="Anulada">
@endif
@endforeach
    <table style='width: 100%; border-collapse: collapse; font-size: 12px; font-family: arial;'>
        <tr style='height: 35px;'>
            <td style=' text-align: left; font-family: arial;margin-top: 16px; font-size: 8px; font-weight: bold; margin-bottom: 0px;'>AMORTIGUADORES ANA<br>EL ALTO - Av. 6 de Marzo</td>
            <td></td>
            <td></td>
            <td style=' text-align: right; font-family: arial;margin-top: 16px; font-size: 8px; font-weight: bold; margin-bottom: 0px;'>Fecha:&nbsp;{{now()}}</td>
        </tr>
    </table>
    <div style='margin-top: -40px;'>
       <p style='font-size: 12px; font-weight: bold; text-align: center; margin-left: 40px; margin-right: 40px; display: inline-block; font-family: arial;'></p>
            <div>
                <br>
               <p style='text-align: center; font-size: 15px; font-weight: bold; margin-top: 0px; margin-bottom: 0px; font-family: arial;'>COMPROBANTE DE COMPRAS</p>
           </div>
    </div>

    @foreach ($compra as $compras)
    <div style='/*border-top: 2px solid #000000; border-left: 2px solid; border-right: 2px solid; border-style: solid; border-bottom: 2px solid; background: #FFF5ED;*/ font-family: arial;'> 
        <div style='width: 25%; float: right; font-size: 12px;'> 
            <p style='width: 58%; float: right; margin-top: 16px;'><strong>&nbsp;:&nbsp;</strong>{{$compras->num_compra}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 16px; width: 25%; font-family: arial;'>{{$compras->tipo_identificacion}}&nbsp;Nº&nbsp;</p> 
        </div>
        <div style='width: 150%; float: left; font-size: 12px;'> 
            <p style='width: 70%; float: right; margin-top: 16px;'><strong>&nbsp;:&nbsp;</strong>{{$compras->created_at}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 16px; width: 170%; font-family: arial;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha</p> 
            <p style='width: 70%; float: right; margin-top: 16px;'><strong>&nbsp;:&nbsp;</strong>{{$compras->email}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo</p>  
        </div>
        <div style='width: 70%; float: left; font-size: 12px;'> 
            <p style='width: 80%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$compras->nombre}}</p> 
            <p style='font-size: 10px; font-weight: bold; margin-top: 16px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Nombre Proveedor</p> 
            <p style='width: 80%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$compras->telefono}}</p> 
            <p style='font-size: 10px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Teléfono/Celular</p>
            <p style='width: 80%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$compras->direccion}}</p> 
            <p style='font-size: 10px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Dirección</p>
            <p style='width: 80%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$compras->user}}</p> 
            <p style='font-size: 10px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Comprador</p>   
        </div> 
        <br><br><br><br><br><br><br>
    </div>
    @endforeach

   <table style='border: 2px solid #C0C0C0; width: 100%; border-collapse: collapse; font-size: 12px; font-family: arial;'>

        <tr>
            <th style='width: 90px; border: 2px solid;'>CANTIDAD</th>
            <th style='border: 2px solid;'>DETALLE</th>
            <th style='width: 120px; border: 2px solid;'>PRECIO UNITARIO</th>
            <th style='width: 120px; border: 2px solid;'>SUBTOTAL</th>
        </tr>

        <tbody>
        @foreach($detalles as $det)
        <tr style='height: 35px;'>
            <td style='text-align: center; border: 2px solid #C0C0C0;'>{{$det->cantidad}}</td>
            <td style='border: 2px solid #C0C0C0;'>{{$det->producto}}</td>
            <td style='text-align: right; border: 2px solid #C0C0C0;'>Bs.&nbsp;{{$det->precio}}&nbsp;</td>
            <td style='text-align: right; border: 2px solid #C0C0C0;'>Bs.&nbsp;{{number_format($det->cantidad*$det->precio,2)}}&nbsp;</td>
        </tr>
        @endforeach

        @foreach ($compra as $compras)
            <tr style='height: 35px;'>
                   <td style='text-align: right; border: 2px solid #C0C0C0;' colspan='3'><b>TOTAL&nbsp;</b></td> 
                   <td style='text-align: right; border: 2px solid #C0C0C0;'><b>Bs.&nbsp;{{number_format($compras->total,2)}}&nbsp;</b></td> 
            </tr>
            <!--
            <tr style='height: 35px;'>
                   <td style='text-align: right; border: 2px solid #C0C0C0;' colspan='3'><b>IVA (13%):&nbsp;</b></td> 
                   <td style='text-align: right; border: 2px solid #C0C0C0;'><b>Bs.&nbsp;{{number_format($compras->total*$compras->impuesto,2)}}&nbsp;</b></td> 
            </tr>
            -->
            <tr style='height: 35px;'>
                   <td style='text-align: right; border: 2px solid #C0C0C0;' colspan='3'><b>TOTAL A PAGAR&nbsp;</b></td> 
                   <td style='text-align: right; border: 2px solid #C0C0C0;'><b>Bs.&nbsp;{{number_format($compras->total,2)}}&nbsp;</b></td> 
            </tr>
        @endforeach
            <tr style='height: 35px;'>
                    <td style='border: 2px solid #C0C0C0; font-size: 8px;' colspan='4'><b>Son:&nbsp;{{$formatter->toInvoice($compras->total,2)}}&nbsp;BOLIVIANOS</b></td> 
            </tr>
           <!--<tr style='height: 35px; text-align: center;'> 
                    <td style='border: 2px solid #C0C0C0;' colspan='5'><b>SIN ITEMS</b></td> 
            </tr>-->
        </tbody>

   </table>
   <table style='width: 100%; border-collapse: collapse; font-size: 12px; font-family: arial;'>
       <tr style='height: 35px;'>
           <td></td>
           <td style=' text-align: center; font-family: arial;margin-top: 16px; font-size: 12px; font-weight: bold; margin-bottom: 0px;'><br><br><br><br><br><br>CONTADOR</td>
           <td style=' text-align: center; font-family: arial;margin-top: 16px; font-size: 12px; font-weight: bold; margin-bottom: 0px;'><br><br><br><br><br><br>GERENTE</td>
           <td></td>
       </tr>
   </table>
    <div style='font-family: arial;'>
       <p style='width: 165%;text-align: center; font-size: 8px; text-transform: none; font-style: italic; padding-bottom: 0px; margin-bottom: 2px;'></p>
    </div>
    
@else
        <!-- Page Content -->
                
        <div class="hero-inner">
            <div class="content content-full">
                <div class="py-30 text-center">
                    <div class="display-3">
                        <h3 class="text-danger" style="color:red;">ERROR</h3>
                    </div>
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