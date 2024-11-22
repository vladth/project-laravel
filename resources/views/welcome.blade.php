<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <title>AMORTIGUADORES "ANA"</title>

  <meta charset="UTF-8">
  <link rel="shortcut icon" href="{{ asset('media/img/logo/ANITA1.png') }}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/bootstrap.min.css') }}">

  <!-- Font-Awesome -->
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/font-awesome.css') }}">

  <!-- Icomoon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/icomoon.css') }}">

  <!-- Slider -->
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/swiper.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/slider.css') }}">

  <!-- Animate.css') }} -->
  <link rel="stylesheet" href="{{ asset('welcome/css/animate.css') }}">

  <!-- Color Switcher -->
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/switcher.css') }}">

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ asset('welcome/css/owl.carousel.css') }}">

  <!-- Main Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/default.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/styles.css') }}" id="colors">
  <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/price.css') }}">

  <!-- Css PRICING -->

  <!-- Fonts Google -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

</head>
<body>


<!-- Preloader Start-->
<div id="preloader">
  <div class="row loader">
    <div class="loader-icon"></div>
  </div>
</div>
<!-- Preloader End -->


<!-- Top-Bar START -->
<div id="top-bar" class="hidden-sm-down">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-12">
        <div class="top-bar-info">
          <ul>
            <li><i class="fa fa-phone"></i><a href="">+591 - 62542325</a></li>
            <li><i class="fa fa-envelope"></i><a href="">info@amortiguadoresana.com</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-12">
        <ul class="social-icons hidden-md-down">
          <li><a href="https://www.facebook.com/profile.php?id=61566574722247&mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#contacto"><i class="fa fa-envelope"></i></a></li>
          <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Top-Bar END -->


<!-- Navbar START -->
<header>
  <nav id="navigation4" class="container navigation">
    <div class="nav-header">
      <a class="nav-brand" href="{{ url('/') }}">
        <img src="{{ asset('media/img/logo/ANITA9.png') }}" class="main-logo" alt="logo" id="main_logo" width="300" height="80">
      </a>
      <div class="nav-toggle"></div>
    </div>
    
    <div class="nav-menus-wrapper">
      <ul class="nav-menu align-to-right">
        <li><a href="#">Inicio</a></li>
        <li><a href="#quienes">Quienes Somos</a></li>
        <li><a href="#producto">Productos</a></li>
        <li><a href="#contacto">Contáctenos</a></li>
        <li>
          @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
            @endif
        </li>
        @if ($message = Session::get('success'))
          <li>
              <a href="" style="color:#82d373;" class="alert" role="alert"><strong>{{ $message }}</strong></a>
          </li>
        @endif
      </ul>
    </div>
  </nav>
</header>
<!-- Navbar END -->


<!-- Slider START -->
<div class="swiper-main-slider swiper-container">
  <div class="swiper-wrapper">
   
    <div class="swiper-slide" style="background-image:url('{{ asset('media/img/const/12.jpg') }}');">
      <div class="medium-overlay"></div>
      <div class="container">
        <div class="slider-content left-holder">
          <h2 class="animated fadeInDown text-uppercase">
            Nuestros contactos
          </h2>
          <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
              <p class="animated fadeInDown">
                Amortiguadores ANA tiene contactos comerciales con empresas de auto partes y accesorios como: WELMET, MONROE, GDST, PERFECT, KYB, TOKICO, HITACHI, JSK, COFAP y SHIBUMI.
              </p>
            </div>
          </div>
          <div class="animated fadeInUp mt-25 text-right">
            <div class="footer-social-icons mt-30">
              <ul>
                <li id="uno"><a id="uno" href="https://www.facebook.com/profile.php?id=61566574722247&mibextid=ZbWKwL"><i class="fa fa-facebook-square"></i></a></li>
                <li id="dos"><a id="dos" href="#contacto"><i class="fa fa-envelope"></i></a></li>
                <li id="tres"><a id="tres" href="#"><i class="fa fa-whatsapp"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- Slide 3 Start -->
    <div class="swiper-slide" style="background-image:url('{{ asset('media/img/const/11.jpg') }}');">
      <div class="medium-overlay"></div>
      <div class="container">
        <div class="slider-content left-holder">
          <h2 class="animated fadeInDown text-uppercase">
            Amortiguadores para toda marca <br>de vehículo
          </h2>
          <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
              <p class="animated fadeInDown">
                Nos especializamos en entregar repuestos de alta calidad y confiabilidad respondiendo a las necesidades de todos nuestros clientes. Distribuimos las mejores marcas japonesas y coreanas, orientados a la creación del prestigio de su negocio, con un concepto rápido, confiable y personalizado.
              </p>
            </div>
          </div>
          <div class="animated fadeInUp mt-30 text-right">
            <div class="footer-social-icons mt-30">
              <ul>
                <li id="uno"><a id="uno" href="https://www.facebook.com/profile.php?id=61566574722247&mibextid=ZbWKwL"><i class="fa fa-facebook-square"></i></a></li>
                <li id="dos"><a id="dos" href="#contacto"><i class="fa fa-envelope"></i></a></li>
                <li id="tres"><a id="tres" href="#"><i class="fa fa-whatsapp"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Slide 3 End -->

  </div>
  <!-- Add Arrows -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <!-- Add Pagination -->
  <div class="swiper-pagination"></div>
</div>
<!-- Slider END -->


<!-- Feature Boxes Section START -->
<div class="section-block" id="producto">
  <div class="container">
    <div class="section-heading center-holder">
      <br>
      <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
      <h3>PRODUCTOS DISPONIBLES</h3>
      <div class="section-heading-line"></div>
      <p>Tenemos los siguientes productos para sus vehículos.....</p>
    </div>
    <div class="row mt-50">
      @foreach($productos as $prod)
      @if($prod->condicion=="1")
      <div class="col-md-4 col-sm-4 col-12">
        <div class="team-member">
          <ul class="price">
            <li class="header text-uppercase">{{ $prod->categoria }}</li>
            <li>
                <div class="shop-cart-box-img">
                  <img src="{{asset('/imagenes/producto/'.$prod->imagen)}}" alt="img">
                </div>
            </li>
            <li class="text-uppercase"><strong style="color: #111;">Descripción</strong></li>
            <li style="color: #111; font-size: : 5px;" class="text-left text-uppercase">{{ $prod->nombre }}&nbsp;:&nbsp;<p class="text-lowercase">{{ $prod->descripcion }}</p></li>
            @if($prod->descuento>"0")
              <li style="color: #e3320c;">Precio&nbsp;&nbsp;{{$prod->precio_venta}}&nbsp;Bs.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $prod->descuento }}&nbsp;<i class="fa fa-percent"></i></li>
              @else
              <li style="color: #13ac03;">Precio&nbsp;&nbsp;{{$prod->precio_venta}}&nbsp;Bs.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $prod->descuento }}&nbsp;<i class="fa fa-percent"></i></li>
            @endif

            @if($prod->stock>"0")
              <li><p class="button" style="background-color: #4CAF50;">Stock&nbsp;&nbsp;&nbsp;&nbsp;{{ $prod->stock }}</p></li>
              @else
              <li><p class="button" style="background-color: #e3320c;">Stock&nbsp;&nbsp;&nbsp;&nbsp;{{ $prod->stock }}</p></li>
            @endif
          </ul>
        </div>
      </div>
      @endif
      @endforeach
      {{ $productos->render() }}
    </div>
  </div>
</div>
<!-- Feature Boxes Section END -->

</body>
<!-- Latest News Section START -->
<div class="section-block-grey" id="quienes">
  <div class="container">
    <div class="section-heading">
      <br>
      <span><i class="fa fa-street-view" aria-hidden="true"></i></span>
      <h4>QUIENES SOMOS</h4>
      <!--<div class="section-heading-line-left"></div>-->

      <p>La Empresa Importadora y Distribuidora de Amortiguadores “ANA “se creó el año 2013 como una empresa <br> comercializadora de repuestos para vehículos tanto de importación como nacionales. </p>
      <p>Nuestro objetivo es distribuir y comercializar productos de alta calidad de las mejores marcas japonesas, <br> coreanas y americanas, respondiendo a la necesidad de cada cliente.</p>
    </div>
    <div class="row mt-40">
      <div class="owl-carousel owl-theme" id="blog-grid">

        <div class="blog-grid-simple">
          <h4 class="text-center"><i class="fa fa-check-square-o" aria-hidden="true"></i> Misión</h4> 
          <p>Nuestra misión es el entregar repuestos de alta calidad y confiabilidad respondiendo a las necesidades de todos nuestros clientes, orientados a la creación del prestigio de su negocio, con un concepto rápido, confiable y personalizado</p>
          <br><br>  
          <div class="blog-grid-simple-content">
            <div class="row blog-grid-simple-date">
            </div>
          </div>
        </div>

        <div class="blog-grid-simple">
          <h4 class="text-center"><i class="fa fa-check-square-o" aria-hidden="true"></i> Visión</h4>
          <p>Nuestro propósito es ser una importadora de excelencia, confiable, centrada en el cliente y sus necesidades, comprometida con el bienestar de todo su personal; basada en valores y principios éticos que se llegan a manifestar claramente en nuestros productos de alta calidad.</p><br>
          <div class="blog-grid-simple-content">
            <div class="row blog-grid-simple-date">
            </div>
          </div>
        </div>

        <img src="{{ asset('media/img/const/img2.png') }}" class="main-logo" alt="logo" id="main_logo" width="300" height="60">

      </div>
    </div>
    </div>
  </div>
</div>
<!-- Latest News Section END -->


<!-- FAQ Section START -->
<div class="section-block" id="contacto">
  <div class="container">
    <div class="section-heading text-md-right">
      <br>
      <span><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
      <h4>CONTACTENOS</h4>
      <div class="section-heading-line-right"></div>
    </div>
    <div class="row mt-40">

      <div class="col-md-6 col-sm-6 col-12">
        <div class="pr-30-md">
          <!-- Accordions Grey START -->
          <div class="panel-group mt-10" id="accordion2" role="tablist" aria-multiselectable="true">
            <img src="{{ asset('media/img/atencion/03.png') }}" width="400" height="620">
          </div>
          <!-- Accordions Grey END -->
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-12">
        <div class="feedback-box">
          <h5>Simplemente escriba su consulta y nos pondremos en contacto lo antes posible.</h5>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
     <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Revise que todos los datos sean correctos.</strong>
    </div>
   @endif
   @if ($message = Session::get('success'))
   <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
             <strong>{{ $message }}</strong>>
    </div>
   @endif
          <form method="post" action="{{url('/send')}}" class="feedback-form" autocomplete="off">
            {{ csrf_field() }}
            <div class="row mt-10">
              <div class="col-md-12 col-12">
                <input type="text" name="name" value="{{old('name')}}" placeholder="Nombre Completo" required>
              </div>
              <div class="col-md-12 col-12">
                  {!!$errors->first('name','<span class="help-block">:message</span>')!!}
              </div>
              <div class="col-md-12 col-12">
                <input type="email" name="email" value="{{old('email')}}" placeholder="Su Correo Electronico" required>
              </div>
              <div class="col-md-12 col-12">
                  {!!$errors->first('email','<span class="help-block">:message</span>')!!}
              </div>
              <div class="col-md-12">
                <textarea name="message" placeholder="Describa su consulta" required>{{old('message')}}</textarea>
              </div>
              <div class="col-md-12 col-12">
                  {!!$errors->first('message','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <center><button type="submit" type="button" class="btn btn-success"><i class="fa fa-envelope-o" aria-hidden="true"></i> Enviar</button></center>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- FAQ Section END -->
<div class="container-fluid block-title">
      <div class="map-clean">
        <div class="section-heading container">
            <div class="intro">
                <h4 class="text-uppercase text-center block-title" style="font-family: Spectral, serif;"><span><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></span> Ubicación</h4>
                <p class="text-center block-title" style="font-family: Spectral, serif;">El Alto, Avenida 6 de Marzo Nro.223, entre calles 5 y 6, Zona: VILLA BOLIVAR A</p><br>
            </div>
        </div>
      <iframe allowfullscreen="" frameborder="0" width="100%" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.3110720055934!2d-68.16783881541761!3d-16.51038598423482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edf00059590e1%3A0xe242bfa06a56df45!2sAmortiguadores%20Ana!5e0!3m2!1ses!2sbo!4v1728953461279!5m2!1ses!2sbo"></iframe>
      </div>
</div>
<!-- Footer START -->
<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">AMORTIGUADORES ANA </span><span class="font-size-xl " style=" color:#0578b0 ;"></span></h6>
        <p>Somos una empresa que brinda los servicios según las necesidades de nuestros clientes.</p>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold text-center">HORARIOS DE ATENCIÓN</h6>
        <p class="text-center">Horarios en Oficinas</p>
         <p class="text-center">Lunes - Viernes</p>
        <p class="text-center"><i class="fa fa-clock-o"></i> 8:30 AM - 18:00 PM</p>
        <p class="text-center">Horarios de Consulta</p>
        <p class="text-center">Lunes - Sábado</p>
        <p class="text-center"><i class="fa fa-clock-o"></i> 6:00 AM - 23:59 PM </p>
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">CONTACTENOS</h6>
        <p>
          <i class="fa fa-home mr-2"></i>El Alto – Av. 6 de Marzo Nro. 223, <br> Local 1, entre calles 5 y 6 Zona Villa Bolivar A</p>
        <p>
          <i class="fa fa-envelope mr-2"></i>info@amortiguadoresana.com</p>
        <p>
          <i class="fa fa-phone mr-2"></i>+591 - 62542325</p>
        <p>
          <i class="fa fa-whatsapp mr-2"></i>+591 - 62542325</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-sm clearfix">
            <div class="float-right" style="color:#999;">
                Desarrollado por: <a class="font-w600" href="" target="_blank" style="color:#08374f;"><strong>E.Barrera P.</strong></a><i class="fa fa-heart text-pulse" style="color:red;"></i>
            </div>
            <div class="float-left">
                <!--Copyright-->
                <p class="text-center text-md-left">© 2024 Copyright:
                  <a href="" style="color:#08374f;">
                    <strong> Amortiguadores Ana</strong>
                  </a>
                </p>
            </div>
        </div>
    </footer>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
          <div class="footer-social-icons mt-30 text-center">
            <ul>
              <li id="uno"><a id="uno" href="https://www.facebook.com/profile.php?id=61566574722247&mibextid=ZbWKwL"><i class="fa fa-facebook-square"></i></a></li>
              <li id="dos"><a id="dos" href="#contacto"><i class="fa fa-envelope"></i></a></li>
              <li id="tres"><a id="tres" href="#"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
          </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>
<!-- Footer END -->

<!-- Scroll to top button Start -->
<a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- Scroll to top button End -->

<script src="{{ asset('dev/alert.js') }}"></script>

<!-- Jquery -->
<script src="{{ asset('welcome/js/jquery.min.js') }}"></script>

<!--Popper JS-->
<script src="{{ asset('welcome/js/popper.min.js') }}"></script>

<!-- Bootstrap JS-->
<script src="{{ asset('welcome/js/bootstrap.min.js') }}"></script>

<!-- Owl Carousel-->
<script src="{{ asset('welcome/js/owl.carousel.js') }}"></script>

<!-- Navbar JS -->
<script src="{{ asset('welcome/js/navigation.js') }}"></script>
<script src="{{ asset('welcome/js/navigation.fixed.js') }}"></script>

<!-- Wow JS -->
<script src="{{ asset('welcome/js/wow.min.js') }}"></script>

<!-- Countup -->
<script src="{{ asset('welcome/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('welcome/js/waypoints.min.js') }}"></script>

<!-- Tabs -->
<script src="{{ asset('welcome/js/tabs.min.js') }}"></script>

<!-- Yotube Video Player -->
<script src="{{ asset('welcome/js/jquery.mb.YTPlayer.min.js') }}"></script>

<!-- Swiper Slider -->
<script src="{{ asset('welcome/js/swiper.min.js') }}"></script>

<!-- Isotop -->
<script src="{{ asset('welcome/js/isotope.pkgd.min.js') }}"></script>

<!-- Modernizr -->
<script src="{{ asset('welcome/js/modernizr.js') }}"></script>

<!-- Switcher JS -->
<script src="{{ asset('welcome/js/switcher.js') }}"></script>

<!-- Google Map -->
<script src="{{ asset('welcome/js/map.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('welcome/js/main.js') }}"></script>

</body>
</html>