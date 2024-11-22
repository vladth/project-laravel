@extends('layouts.app')
@section("title","Libro Mayor")
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
        <h2 class="content-heading text-center" style="text-decoration: underline;">LIBRO MAYOR</h2>

                    	<div class="form-group col-md-12">
                    		<div class="form-row">
					                
					                <div class="form-group col-md-12 no-print">
					                	
					                	 {!!Form::open(array('url'=>'mayor','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
					                	 		
					                	 		<div class="form-group col-md-6 pull-right">
					                		
								                	 <div id="range" class="input-daterange input-group">
													  <input type="text" name="start" id="start" class="form-control date data_formato" placeholder="Fecha Inicio">
													  <div class="input-group-prepend input-group-append">
													    <span class="input-group-text font-w600"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<i class="fa fa-angle-double-left"></i></span>
													   </div>
													  <input type="text" name="end" id="end" class="form-control date data_formato" placeholder="Fecha Fin">
													</div>

								                </div>

					                	 		<div class="form-group col-md-6 pull-right">
								                <select class="js-select2 form-control" name="sql_cuenta" id="sql_cuenta" tyle="width: 100%;" data-placeholder=" SELECCIONE">

								                   <option></option>
								                   @foreach($cuentas as $cuent)

								                    <option value="{{$cuent->id}}">{{$cuent->cuenta_tipo}}</option>
								                                           
								                    @endforeach

								                </select>
								                </div>

								           		<div class="form-group pull-right">
								           			&nbsp;&nbsp;
								           			<button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
								           		</div>
								           		
								           		<div class="form-group pull-right">
								                	
					                                <a href="#">
					                                    <button onclick="print()" class="btn btn-warning no-print" type="button" data-toggle="modal" data-target="#abrirmodal">
					                                        <i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir
					                                    </button>
					                                </a>
					                            </div>
					                            
								         {{Form::close()}}
					                </div>
					        </div>
					    </div>
					    <div class="form-group">
					            <p class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$star}} {{$end}}</p>
					    </div>
    
</div>
    	<div class="container-fluid">
                <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default no-print">
                        	
                            <h3 class="block-title">Tabla de Libro<small> Mayor</small></h3>
                            
                        </div>
                    <div class="block-content">
                    	<div class="table-responsive col-md-12">
                            <table class="js-table-sections table table-hover">
                            	
                                <thead class="bg-info">
                                    <tr>
                                        <th style="width: 10%;">Fecha</th>
                                        <th class="text-right" style="width: 8%;">NºCompr.</th>
                                        <th class="text-center" style="width: 35%;">Nombre de Cuenta</th>
                                        <th class="text-right" style="width: 15%;">Debe</th>
                                        <th  class="text-right" style="width: 15%;">Haber</th>
                                    </tr>
                                </thead>

                                <tfoot>
                  					@foreach($totalmayor as $total)
				                    <tr>
				                        <th  colspan="3"><p align="right">TOTAL:</p></th>
				                        <th><p align="right">&nbsp;{{number_format($total->totalD,2)}}</p></th>
				                        <th><p align="right">&nbsp;{{number_format($total->totalH,2)}}</p></th>
				                    </tr>
				                    @if($total->totalD > $total->totalH)
				                    <tr>
				                        <th  colspan="3"><p align="right">SALDO:</p></th>
				                        <th><p align="right">&nbsp;{{number_format($saldoD = $total->totalD - $total->totalH,2)}}</p></th>
				                        <th></th>
				                    </tr>
				                    @else
				                    <tr>
				                        <th  colspan="3"><p align="right">SALDO:</p></th>
				                        <th></th>
				                        <th><p align="right">&nbsp;{{number_format($saldoH = $total->totalH - $total->totalD,2)}}</p></th>
				                    </tr> 
				                    @endif 
				                    @endforeach
				                </tfoot>
                                <!--***********************************-->
                                <tbody>
	                                    @foreach($mayores as $det)

						                    <tr>
						                      <td>{{Carbon\Carbon::parse($det->created_at)->toDateString()}}</td>
						                      <td class="text-right">{{$det->nro}}</td>
						                      <td>&nbsp;{{$det->cuenta_tipo}}</td>
						                      <td align="right">&nbsp;{{number_format($det->debe,2)}}</td>
						                      <td align="right">&nbsp;{{number_format($det->haber,2)}}</td>
						                    
						                    </tr> 

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