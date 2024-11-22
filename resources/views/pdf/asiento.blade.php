@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 3)
<style>
   .anulada{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    }
</style>
@foreach ($asientos as $asiento)
@if($asiento->estado == 'Anulado')
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
               <p style='text-align: center; font-size: 15px; font-weight: bold; margin-top: 0px; margin-bottom: 0px; font-family: arial;'>COMPROBANTE DIARIO</p>
           </div>
    </div>

    @foreach ($asientos as $asiento)
    <div style='/*border-top: 2px solid #000000; border-left: 2px solid; border-right: 2px solid; border-style: solid; border-bottom: 2px solid; background: #FFF5ED;*/ font-family: arial;'> 
        <div style='width: 25%; float: right; font-size: 12px;'> 
            <p style='width: 58%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$asiento->created_at->toDateString()}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 16px; width: 25%; font-family: arial;'>Fecha</p> 
            <p style='width: 58%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$asiento->tipo_cambio}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 60%; font-family: arial;'>Tipo Cambio</p>
            <p style='width: 58%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$asiento->cantidad_moneda}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 25%; font-family: arial;'>Cambio</p>
            <!--<p style='width: 58%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>255554555</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 25%; font-family: arial;'>Concepto</p>-->  
        </div>
        <div style='width: 150%; float: left; font-size: 12px;'> 
            <p style='width: 65%; float: right; margin-top: 16px;'><strong>&nbsp;:&nbsp;</strong>{{$asiento->forma_pago}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 16px; width: 170%; font-family: arial;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forma de Pago</p> 
            <p style='width: 65%; float: right; margin-top: 16px;'><strong>&nbsp;:&nbsp;</strong>{{$asiento->cheque}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Número de Cheque</p>  
        </div>
        <div style='width: 70%; float: left; font-size: 12px;'> 
            <p style='width: 74%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$asiento->nro}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 16px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Número Comprobante</p> 
            <p style='width: 74%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$asiento->banco}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Banco</p>
            <p style='width: 74%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$asiento->concepto}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Concepto</p>
            <p style='width: 74%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$asiento->glosa}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Golsa</p>
            <p style='width: 74%; float: right; margin-top: 16px;'><strong>:&nbsp;</strong>{{$asiento->razon_social}}</p> 
            <p style='font-size: 12px; font-weight: bold; margin-top: 0px; width: 200%; font-family: arial;'>&nbsp;&nbsp;Razon Social</p>   
        </div> 
        <br><br><br><br><br><br><br><br>
    </div>
    @endforeach

   <table style='border: 2px solid #C0C0C0; width: 100%; border-collapse: collapse; font-size: 12px; font-family: arial;'>

        <tr>
            <th style='background: #99b4d1; width: 90px; border: 2px solid #C0C0C0;'>CUENTA</th>
            <th style='background: #99b4d1; border: 2px solid #C0C0C0;'>NOMBRE DE CUENTA</th>
            <th style='background: #99b4d1; width: 120px; border: 2px solid #C0C0C0;'>DEBE</th>
            <th style='background: #99b4d1; width: 120px; border: 2px solid #C0C0C0;'>HABER</th>
        </tr>

        <tbody>
        @foreach($detalles as $det)
        <tr style='height: 35px;'>
            <td style='text-align: center; border: 2px solid #C0C0C0;'>{{$det->cuenta01}}</td>
            <td style='border: 2px solid #C0C0C0;'>{{$det->cuenta_tipo}}</td>
            <td style='text-align: right; border: 2px solid #C0C0C0;'>{{number_format($det->debe,2)}}&nbsp;</td>
            <td style='text-align: right; border: 2px solid #C0C0C0;'>{{number_format($det->haber,2)}}&nbsp;</td>
        </tr>
        @endforeach

        @foreach ($asientos as $asiento)
            <tr style='height: 35px;'>
                   <td style='text-align: right; border: 2px solid #C0C0C0;' colspan='2'><b>TOTAL:&nbsp;</b></td> 
                   <td style='text-align: right; border: 2px solid #C0C0C0;'><b>{{number_format($asiento->totalD,2)}}&nbsp;</b></td>
                   <td style='text-align: right; border: 2px solid #C0C0C0;'><b>{{number_format($asiento->totalH,2)}}&nbsp;</b></td> 
            </tr>
        @endforeach
            <tr style='height: 35px;'>
                    <td style='border: 2px solid #C0C0C0; font-size: 8px;' colspan='4'><b>Son:&nbsp;{{$formatter->toInvoice($asiento->totalD,2)}}&nbsp;BOLIVIANOS</b></td> 
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
       <p style='width: 165%;text-align: center; font-size: 8px; text-transform: none; font-style: italic; padding-bottom: 0px; margin-bottom: 2px;'>Generado por&nbsp;:&nbsp;{{$asiento->nombre}}</p>
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