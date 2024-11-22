@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 4)
<style>
    #dev img{display: block; 
        float: center; 
        margin-left: auto; 
        margin-right: auto;}

    .anulada{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
    }
</style>
@foreach ($venta as $ventas)
@if($ventas->estado == 'Anulado')
<img class="anulada" src="media/img/anulado.png" alt="Anulada">
@endif
@endforeach
<div>
    @foreach ($venta as $ventas)
    <div style='width: 65%; float: right; font-weight: bold;'>
        <br>
            <div style='float: right; border-style: solid; border-top: 2px solid #000000; border-left: 2px solid #000000; border-bottom: 2px solid; border-right: 2px solid; font-size: 13px; font-family: arial; width: 73%; padding-bottom: 12px;'>
                  <p style='width: 40%; float: left; text-align: right; font-weight: bold; margin-top: 12px; margin-bottom: 3px; letter-spacing: 0px;'>NIT:</p> 
                    <p style='width: 90%; float: left; text-align: right; margin-top: 12px; margin-bottom: 3px; letter-spacing: 0px; font-weight: normal;'>129485028</p> 
                     <br><br>
                    <p style='float: left; text-align: right; font-weight: bold; margin-top: 5px; margin-bottom: 2px; letter-spacing: 0px; width: 40%;'>{{$ventas->tipo_identificacion}} Nº:</p>
                    <p style='width: 90%; float: left; text-align: right; font-weight: bold; margin-top: 2px; margin-bottom: 2px; letter-spacing: 0px; color: #f10e0e; font-size: 18px;'>{{$ventas->num_venta}}</p>
                <br> 
                    <br>
                    <p style='width: 40%; float: left; text-align: right; font-weight: bold; margin-top: 2px; padding-bottom: 0px; margin-bottom: 0px; letter-spacing: 0px;'>Cod. Autorización:</p>
                    <p style='width: 90%; float: left; text-align: right; margin-top: 2px; padding-bottom: 0px; margin-bottom: 0px; letter-spacing: 0px; font-weight: normal; font-family: arial;'>{{$ventas->autorizacion}}</p>
                    <br> 
            </div> 
    </div>
    @endforeach
    
    <div style='width: 50%; text-align: center !important;'>
        
         <span style='text-align: center !important; font-family: arial; font-size: 10px; font-weight: bold;'>De ANA MARIA CAMACHO COMECA<br>Casa Matriz<br>Av. 6 de Marzo Nro. 223 Edif.: SIN NOMBRE LOCAL 1<br>Zona: VILLA BOLIVAR A<br>Teléfono/Celular: 62542325<br>La Paz-Bolivia<br></span>
         <br>
         <p style='width: 310%;text-align: center; margin-top: 5px; display: block; font-family: arial;'>ORIGINAL</p>
         <p style='width: 275%; text-align: center; margin-top: 5px; font-size: 8.5px; font-weight: bold; padding-right: 4px; margin-right: 50px; margin-left: 50px;'>Venta de partes, piezas y accesorios de vehículos automotores</p>
        </div>
    </div>
    @foreach ($venta as $ventas)
    <div style='margin-top: -40px;'>
       <p style='font-size: 12px; font-weight: bold; text-align: center; margin-left: 40px; margin-right: 40px; display: inline-block; font-family: arial;'></p>
            <div>
                <br>
               <p style='text-align: center; font-size: 27px; font-weight: bold; margin-top: 0px; margin-bottom: 0px; font-family: arial;'>{{$ventas->tipo_identificacion}}</p>
           </div>
    </div>
    @endforeach

    <div style='border-top: 2px solid #000000; border-left: 2px solid; border-right: 2px solid; border-style: solid; border-bottom: 2px solid; font-family: arial;'> 
        <div style='width: 25%; float: right; font-size: 14px;'> 
            <p style='width: 65%; float: right; margin-top: 16px;'>{{$ventas->num_documento}}</p> 
            <p style='font-size: 14px; font-weight: bold; margin-top: 16px; width: 25%; font-family: arial;'>NIT/CI:</p> 
        </div> 
        <div style='width: 75%; padding-bottom: 12px;'> 
               <div style='display: block;'> 
                       <p style='width: 25%; display: inline-block; float: left; margin-left: 16px; margin-top: 16px; font-size: 14px; font-weight: bold; margin-bottom: 0px; font-family: arial;'>Lugar:</p>
                       <p style='width: 55%; display: inline-block; float: right; margin-top: 1px; margin-bottom: 0px; font-size: 14px; font-family: arial;'>  La Paz ,&nbsp;&nbsp;&nbsp;{{$ventas->fecha_venta->formatLocalized('%d de %B %Y')}}</p>
                       <br>
                       <p style='width: 25%; display: inline-block;  float: left; margin-left: 16px; margin-top: 8px; font-weight: bold; font-size: 14px; font-family: arial;'>Señor(es):</p>
                       <p style='width: 51%; display: inline-block; float: right; margin-top: 8px; margin-bottom: 0px; font-size: 14px; font-family: arial;'>{{$ventas->nombre}}</p>
               </div> 
        </div>
        <br>
    </div>


   <table style='border: 2px solid #C0C0C0; width: 100%; border-collapse: collapse; font-size: 12px; font-family: arial;'>

        <tr>
            <th style='width: 80px; border: 2px solid #C0C0C0;'>CANTIDAD</th>
            <th style='border: 2px solid #C0C0C0;'>DETALLE</th>
            <th style='width: 140px; border: 2px solid #C0C0C0;'>PRECIO UNITARIO</th>
            <th style='width: 90px; height: 35px; border: 2px solid #C0C0C0;'>DESCUENTO(%)</th>
            <th style='width: 120px; border: 2px solid #C0C0C0;'>SUBTOTAL</th>
        </tr>

        <tbody>
        @foreach ($detalles as $detalle)
        <tr style='height: 35px;'>
            <td style='text-align: center; border: 2px solid #C0C0C0;'>{{$detalle->cantidad}}</td>
            <td style='border: 2px solid #C0C0C0;'>{{$detalle->producto}}</td>
            <td style='text-align: right; border: 2px solid #C0C0C0;'>Bs.&nbsp;{{$detalle->precio}}&nbsp;</td>
            <td style='text-align: right; border: 2px solid #C0C0C0;'>{{$detalle->descuento}}&nbsp;</td>
            <td style='text-align: right; border: 2px solid #C0C0C0;'>Bs.&nbsp;{{number_format($detalle->cantidad*$detalle->precio - $detalle->cantidad*$detalle->precio*$detalle->descuento/100,2)}}&nbsp;</td>
        </tr>
        @endforeach
            @foreach ($venta as $ventas)
            <tr style='height: 35px;'>
                   <td style='text-align: right; border: 2px solid #C0C0C0;' colspan='4'><b>TOTAL&nbsp;</b></td> 
                   <td style='text-align: right; border: 2px solid #C0C0C0;'><b>Bs.&nbsp;{{number_format($ventas->total,2)}}&nbsp;</b></td>  
            </tr>
            <tr style='height: 35px;'>
                   <td style='text-align: right; border: 2px solid #C0C0C0;' colspan='4'><b>MONTO A PAGAR&nbsp;</b></td> 
                   <td style='text-align: right; border: 2px solid #C0C0C0;'><b>Bs.&nbsp;{{number_format($ventas->total,2)}}&nbsp;</b></td>  
            </tr>
            <tr style='height: 35px;'>
                   <td style='text-align: right; border: 2px solid #C0C0C0;' colspan='4'><b>IMPORTE BASE CRÉDITO FISCAL&nbsp;</b></td> 
                   <td style='text-align: right; border: 2px solid #C0C0C0;'><b>Bs.&nbsp;{{number_format($ventas->total,2)}}&nbsp;</b></td>  
            </tr>
            @endforeach

            <tr style='height: 35px;'>
                    <td style='border: 2px solid #C0C0C0;font-size: 8px;' colspan='5'><b>Son:&nbsp;{{$formatter->toInvoice($ventas->total,2)}}&nbsp;BOLIVIANOS</b></td> 
            </tr>

           <!--<tr style='height: 35px; text-align: center;'> 
                    <td style='border: 2px solid #C0C0C0;' colspan='5'><b>SIN ITEMS</b></td> 
            </tr>-->
        </tbody>

   </table>


    <div style='width: 100%; margin-top: 15px; display: inline-block; font-size: 14px'>
        <div style='width: 20%; float: right; text-align: right;' style='font-family: arial;'>
            <p style='width: 45%; text-align: center; margin-top: -12px; font-size: 6px; font-weight: bold; padding-right: 4px; margin-right: 50px; margin-left: 50px;'>Código QR</p><br>
            <img style='width:125px; margin-top: -30px;' src="{{$ventas->venta_qr}}">
        </div>
        <div style='width: 75%; margin-top: 0px; font-family: arial;'>
            <p style='display: inline-block; float: left; margin-left: 16px; margin-top: 16px; font-size: 14px; font-weight: bold; margin-bottom: 0px; font-family: arial;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Código de Control:</p>
            <p style='width: 60%; display: inline-block; float: right; margin-top: -1px; margin-bottom: 0px; font-size: 14px; font-family: arial;'>{{$ventas->codigo_control}}</p>
            <br>
            <p style='width: 30%; display: inline-block;  float: left; margin-left: 16px; margin-top: 8px; font-weight: bold; font-size: 14px; font-family: arial;'>Fecha Límite de Emisión:</p>
            <p style='width: 60%; display: inline-block; float: right; margin-top: 8px; margin-bottom: 0px; font-size: 14px; font-family: arial;'>{{$ventas->fecha_venta->formatLocalized('%d/%m/%Y')}}</p>
        </div>

    </div>
    <div><br><br><br><br></div>
    <div style='font-family: arial;'>
       <p style='width: 100%;text-align: center; font-size: 10px; text-transform: none; padding-bottom: 0px; margin-bottom: 2px;'>ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO DE ESTA SERÁ SANCIONADO PENALMENTE DE ACUERDO A LEY. </p>
       <p style='width: 100%;text-align: center; font-size: 10px; text-transform: none; padding-bottom: 0px; margin-bottom: 2px;'>Ley N° 453: Está prohibido importar, distribuir o comercializar productos expirados o prontos a expirar.</p>
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