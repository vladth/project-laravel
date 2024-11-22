@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2)
    <table style='width: 100%; border-collapse: collapse; font-size: 12px; font-family: arial;'>
        <tr style='height: 35px;'>
            <td style=' text-align: left; font-family: arial;margin-top: 16px; font-size: 8px; font-weight: bold; margin-bottom: 0px;'>AMORTIGUADORES ANA<br>El Alto - Av. 6 de Marzo</td>
            <td></td>
            <td></td>
            <td style=' text-align: right; font-family: arial;margin-top: 16px; font-size: 8px; font-weight: bold; margin-bottom: 0px;'>Fecha:&nbsp;{{now()}}</td>
        </tr>
    </table>
    <div style='margin-top: -40px;'>
       <p style='font-size: 12px; font-weight: bold; text-align: center; margin-left: 40px; margin-right: 40px; display: inline-block; font-family: arial;'></p>
            <div>
                <br>
               <p style='text-align: center; font-size: 15px; font-weight: bold; margin-top: 0px; margin-bottom: 0px; font-family: arial;'>LISTADO DE PRODUCTOS REGISTRADOS</p>
           </div>
    </div>

    
   <table style='border: 2px solid #C0C0C0; width: 100%; border-collapse: collapse; font-size: 10px; font-family: arial;'>

        <tr>
            <th style='background: #99b4d1; width: 50px; border: 2px solid #C0C0C0;'>Nº</th>
            <th style='background: #99b4d1; border: 2px solid #C0C0C0;'>CATEGORÍA</th>
            <th style='background: #99b4d1; border: 2px solid #C0C0C0;'>PRODUCTO</th>
            <th style='background: #99b4d1; width: 50px; border: 2px solid #C0C0C0;'>CÓDIGO</th>
            <th style='background: #99b4d1; width: 50px; border: 2px solid #C0C0C0;'>STOCK</th>
            <th style='background: #99b4d1; width: 120px; border: 2px solid #C0C0C0;'>PRECIO VENTA C/U</th>
        </tr>

        <tbody>
        {{$cont = 0}}
        @foreach($productos as $product)
        <tr style='height: 35px;'>
            <td style='text-align: center; border: 2px solid #C0C0C0;'>{{ ++$cont }}</td>
            <td style='border: 2px solid #C0C0C0;'>{{$product->nombre_categoria}}</td>
            <td style='border: 2px solid #C0C0C0;'>{{$product->nombre}}</td>
            <td style='text-align: right; border: 2px solid #C0C0C0;'>{{$product->codigo}}&nbsp;</td>
            <td style='text-align: center; border: 2px solid #C0C0C0;'>{{$product->stock}}&nbsp;</td>

            <td style='text-align: right; border: 2px solid #C0C0C0;'>Bs.&nbsp;{{number_format($product->precio_venta,2)}}&nbsp;</td>
        </tr>
        @endforeach 

        <tr style='height: 35px;'>
            <td style='border: 2px solid #C0C0C0;text-align: right;' colspan='6'><b>REGISTRO TOTAL&nbsp;:&nbsp;{{$cont}}&nbsp;</b></td> 
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
    <!--<div style='font-family: arial;'>
       <p style='width: 165%;text-align: center; font-size: 8px; text-transform: none; font-style: italic; padding-bottom: 0px; margin-bottom: 2px;'>Generado por&nbsp;:&nbsp;***********</p>
    </div>-->
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
