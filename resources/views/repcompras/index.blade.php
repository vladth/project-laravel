@extends('layouts.app')
@section("title","Consultas-Personal")
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
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2  or Auth::user()->idrol == 3)
<div class="col-lg-12 ">         
        <h2 class="content-heading text-center" style="text-decoration: underline;">CONSULTE SUS VENTAS</h2>

                    	<div class="form-group col-md-12 no-print">
                    		<div class="form-row">
					                
					                <div class="form-group col-md-12">
					                	
					                	 {!!Form::open(array('url'=>'vpersonal','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
					                	 		
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
													  <input type="text" name="inicio" id="inicio" class="form-control date data_formato" placeholder="Fecha Inicio">
													  <div class="input-group-prepend input-group-append">
													    <span class="input-group-text font-w600"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<i class="fa fa-angle-double-left"></i></span>
													   </div>
													  <input type="text" name="fin" id="fin" class="form-control date data_formato" placeholder="Fecha Fin">
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

                        <div class="block-content block-content-full">
                            
                            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table id="config" class="table table-bordered  display nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nº</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Nombre</th>
                                        <th>Venta</th>
                                        <th>Pagar</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($query as $vp)
                                    <tr>
                                        <td class="text-center">{{ ++$cont }}</td>
                                        <td>{{$vp->anio}}</td>
                                        <td>{{$vp->mes}}</td>
                                        <td>{{$vp->nombre}}</td>
                                        <td>{{$vp->ventas}}</td>
                                        <td>{{$vp->pagar}}</td>
                                        <td>{{$vp->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $query->render() }}
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