@extends('layouts.app')
@section("title","Balance General")
@section("styles")
    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dev/datatables.min.css') }}">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dev/responsive.dataTables.min.css') }}">

    <!-- Standalone -->
	<link href="{{ asset('date/css/datepicker.min.css') }}" rel="stylesheet" />
	
	<!-- For Bulma -->
	<link href="{{ asset('date/css/datepicker-bulma.min.css') }}" rel="stylesheet" />
	<!-- For Foundation -->
	<link href="{{ asset('date/css/datepicker-foundation.min.css') }}" rel="stylesheet" />

@endsection
@section('content')
<!-- Contenido html -->
@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 3)
<div class="col-lg-12 ">         
        <h2 class="content-heading text-center" style="text-decoration: underline;">BALANCE GENERAL</h2>

                    	<div class="form-group col-md-12 no-print">
                    		<div class="form-row">
					                
					                <div class="form-group col-md-12">
					                	
					                	 {!!Form::open(array('url'=>'general','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
					                	 		
					                	 	   <div class="form-group pull-right">
								           			&nbsp;&nbsp;
								           			<button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
								           		</div>
								           		
								           		<div class="form-group pull-right">
								                	
					                                <button onclick="print()" class="btn btn-warning no-print" type="button" data-toggle="modal" data-target="#abrirmodal">
					                                        <i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir
					                                 </button>
					                            </div>

					                	 		<div class="form-group col-md-6 pull-right">
					                		
								                	 <div id="range" class="input-daterange input-group">
													  <input type="text" name="start" id="start" class="form-control date data_formato" placeholder="Fecha Inicio">
													  <div class="input-group-prepend input-group-append">
													    <span class="input-group-text font-w600"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<i class="fa fa-angle-double-left"></i></span>
													   </div>
													  <input type="text" name="end" id="end" class="form-control date data_formato" placeholder="Fecha Fin">
													</div>

								                </div>

								           		
								         {{Form::close()}}
					                </div>
					        </div>
					    </div>
    
</div>
    	<div class="container-fluid">
                <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default no-print">
                        	
                            <h3 class="block-title">Tabla de Balance<small> General</small></h3>
                            
                        </div>


                    <div class="block-content"> 
                    	<div class="table-responsive col-md-12">
                            <table class="js-table-sections table table-hover">
                            	
                                <thead class="">
                                    <tr>

                                        <td class="text-right" style="width: 8%;"><h3 class="block-title"></h3></td>
                                        <td class="text-right text-uppercase" style="width: 35%;"><h3 class="block-title" style="text-decoration: underline;">Nombre de Cuenta</h3></td>
                                        <td class="text-right text-uppercase" style="width: 15%;"><h3 class="block-title" style="text-decoration: underline;">Debe</h3></td>
                                        <td  class="text-right text-uppercase" style="width: 15%;"><h3 class="block-title" style="text-decoration: underline;">Haber</h3></td>
                                    </tr>
                                </thead>

                                <tfoot>
                  					
				                    <tr>
				                    	<td colspan="4"></td>
				                    </tr>
				                    <tr>
				                    	<td colspan="3" class="text-right"><h3 class="block-title"><strong>TOTAL ACTIVO: </strong></h3></td>
				                    	@foreach($totalactivos as $activo)
				                    	@if($activo->activoT > 0)
				                    	<td class="text-right"><h3 class="block-title" style="text-decoration: underline;">{{number_format($activo->activoT,2)}}</h3></td>
				                    	@else
				                    	<td class="text-right"><h3 class="block-title" style="text-decoration: underline;">{{number_format((-1*($activo->activoT)),2)}}</h3></td>
				                    	@endif
				                    	@endforeach
				                    </tr>
				                    <tr>
				                    	<td colspan="3" class="text-right"><h3 class="block-title"><strong>TOTAL PASIVO: </strong></h3></td>
				                    	@foreach($totalpasivos as $pasivo)
				                    	@if($pasivo->pasivoT > 0)
				                    	<td class="text-right"><h3 class="block-title" style="text-decoration: underline;">{{number_format($pasivo->pasivoT,2)}}</h3></td>
				                    	@else
				                    	<td class="text-right"><h3 class="block-title" style="text-decoration: underline;">{{ number_format((-1*($pasivo->pasivoT)),2)}}</h3></td>
				                    	@endif
				                    	@endforeach
				                    </tr>
				                    <tr>
				                    	<td colspan="3" class="text-right"><h3 class="block-title"><strong>TOTAL PATRIMONIO: </strong></h3></td>
				                    	@foreach($totalpatrimonios as $patrimonio)
				                    	@if($patrimonio->patrimonioT > 0)
				                    	<td class="text-right"><h3 class="block-title" style="text-decoration: underline;">{{number_format(($patrimonio->patrimonioT),2)}}</h3></td>
				                    	@else
				                    	<td class="text-right"><h3 class="block-title" style="text-decoration: underline;">{{ number_format((-1*($patrimonio->patrimonioT)),2) }}</h3></td>
				                    	@endif
				                    	@endforeach
				                    </tr>
				                    <tr>
				                    	<td  colspan="2" class="text-right"><h3 class="block-title"><strong><br>BALANCE GENERAL: </strong></h3></td>
				                    	<td colspan="2" class="text-right"><h3 class="block-title"><strong>ACTIVO | PASIVO + PATRIMONIO
				                    		<br><h3 class="block-title" style="text-decoration: underline;">
				                    		@foreach($totalactivos as $activo)
				                    		  @if($activo->activoT > 0)
				                    			{{number_format($activo->activoT,2)}}
				                    		  @else
				                    		  	{{ number_format((-1*$activo->activoT),2) }}
				                    		  @endif
				                    		@endforeach 
				                    			&nbsp;||&nbsp;
				                    		@foreach($totalpasivos as $pasivo)
				                    		  @if($pasivo->pasivoT > 0 and $patrimonio->patrimonioT > 0) 
				                    		  {{ number_format(($pasivo->pasivoT) + ($patrimonio->patrimonioT),2) }}</h3></strong></h3></td>
				                    		  @else
				                    		  {{ number_format((-1*$pasivo->pasivoT) + (-1*$patrimonio->patrimonioT),2) }}</h3></strong></h3></td>
				                    		  @endif
				                    		@endforeach
				                    </tr>
				                    
				                </tfoot>


                                <!--***********************************-->
                                <tbody>
                                		
                                			<tr>
                                				<td></td>
                                				<td><h3 class="block-title" style="text-decoration: underline;"><strong>ACTIVO</strong></h3></td>
                                				<td colspan="2"></td>
                                			</tr>
	                                    @foreach($totalmayor as $total)
	                                    	@if($total->tipo_plan_cuenta == 'ACTIVO')
		                                    <tr>

		                                    	<td></td>
		                                    	<td class="text-right"><h3 class="block-title"><small>{{$total->tipo_cuenta}}</small></h3></td>
		                                    	<td class="text-right">{{number_format($total->totalD,2)}}</td>
		                                    	<td class="text-right">{{number_format($total->totalH,2)}}</td>
						                    </tr>
						                    @if($total->totalD > $total->totalH)
						                    <tr>
						                        <td colspan="3" style="text-decoration: underline;" class="text-right block-title"><strong>{{number_format($saldoD = $total->totalD - $total->totalH,2)}}</strong></td>
						                        <td></td>
						                    </tr>
						                    @else
						                    <tr>
						                        <td colspan="3" class="text-right"></td>
						                        <td class="text-right block-title" style="text-decoration: underline;"><strong>{{number_format($saldoH = $total->totalH - $total->totalD,2)}}</strong></td>
						                    </tr> 
						                    @endif
						                    @endif
						                @endforeach


						                <tr>
                                				<td></td>
                                				<td><h3 class="block-title" style="text-decoration: underline;"><strong>PASIVO</strong></h3></td>
                                				<td colspan="2"></td>
                                			</tr>
	                                    @foreach($totalmayor as $total)
	                                    	@if($total->tipo_plan_cuenta == 'PASIVO')
		                                    <tr>

		                                    	<td></td>
		                                    	<td class="text-right"><h3 class="block-title"><small>{{$total->tipo_cuenta}}</small></h3></td>
		                                    	<td class="text-right">{{number_format($total->totalD,2)}}</td>
		                                    	<td class="text-right">{{number_format($total->totalH,2)}}</td>
						                    </tr>
						                    @if($total->totalD > $total->totalH)
						                    <tr>
						                        <td colspan="3" style="text-decoration: underline;" class="text-right block-title"><strong>{{number_format($saldoD = $total->totalD - $total->totalH,2)}}</strong></td>
						                        <td></td>
						                    </tr>
						                    @else
						                    <tr>
						                        <td colspan="3" class="text-right"></td>
						                        <td class="text-right block-title" style="text-decoration: underline;"><strong>{{number_format($saldoH = $total->totalH - $total->totalD,2)}}</strong></td>
						                    </tr> 
						                    @endif
						                    @endif
						                @endforeach
						                
						                <tr>
                                				<td></td>
                                				<td><h3 class="block-title" style="text-decoration: underline;"><strong>PATRIMONIO</strong></h3></td>
                                				<td colspan="2"></td>
                                			</tr>
	                                    @foreach($totalmayor as $total)
	                                    	@if($total->tipo_plan_cuenta == 'PATRIMONIO')
		                                    <tr>

		                                    	<td></td>
		                                    	<td class="text-right"><h3 class="block-title"><small>{{$total->tipo_cuenta}}</small></h3></td>
		                                    	<td class="text-right">{{number_format($total->totalD,2)}}</td>
		                                    	<td class="text-right">{{number_format($total->totalH,2)}}</td>
						                    </tr>
						                    @if($total->totalD > $total->totalH)
						                    <tr>
						                        <td colspan="3" style="text-decoration: underline;" class="text-right block-title"><strong>{{number_format($saldoD = $total->totalD - $total->totalH,2)}}</strong></td>
						                        <td></td>
						                    </tr>
						                    @else
						                    <tr>
						                        <td colspan="3" class="text-right"></td>
						                        <td class="text-right block-title" style="text-decoration: underline;"><strong>{{number_format($saldoH = $total->totalH - $total->totalD,2)}}</strong></td>
						                    </tr> 
						                    @endif
						                    @endif
						                @endforeach
						                
						                
	                            </tbody>
	                        </table>
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

@endsection
@section("scripts")
        <!-- Page JS Plugins -->

    <script type="text/javascript" src="{{ asset('dev/datatables.min.js') }}"></script>

    <script src="{{ asset('dev/dataTables.responsive.min.js') }}"></script>

    <!-- Calendario -->
	<script src="{{ asset('date/js/datepicker-full.min.js') }}"></script>
	<script src="{{ asset('date/js/locales/es.js') }}"></script>

    <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script>

   

    <script type="text/javascript">

    	const elem = document.getElementById('range');
		const dateRangePicker = new DateRangePicker(elem, {
		      // options here
		      autohide: true,
		      calendarWeeks: false,
		      clearBtn: false,
		      datesDisabled: [],
		      daysOfWeekHighlighted: [],
		      format: 'yyyy-mm-dd',
		      allowOneSidedRange: false,
		      language: 'es',

		});
    </script>
@endsection