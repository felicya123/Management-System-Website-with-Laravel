<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/pp.png') }}" rel="icon">
  <link href="{{ asset('assets/img/pp.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <!--<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">-->

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.5.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <!-- -->
  
  
  <script src="https://getbootstrap.com/docs/3.3/components/"></script>
   

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
      @guest
        <img src="assets/img/pp.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light">Bank XYZ</h1>
        <h6 class="text-light" style="text-align:center;">Project Management System</h6>
    @else
        <img src="assets/img/pp.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light">{{  Auth::user()->fullname }}</h1><br>
        <h6 class="text-light" style="text-align:center;"> ID :   {{  Auth::user()->user_id }}</h6>
        <h6 class="text-light" style="text-align:center;"> Access Group :   {{  Auth::user()->division }}</h6>
        @endguest
      </div>
      
      <nav class="nav-menu">
        <ul>
        @guest
                            <li class="active">
                                <a href="{{ route('login') }}"><i class="bx bx-user"></i><span>{{ __('Login') }}</span></a>
                            </li>
        
        @else
        
        @if (Auth::user()->division == "Admin")
            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}"><i class="bx bx-user"></i><span>{{ __('Request New User') }}</span></a>
                                </li>
            @endif
        @else
        @if (Auth::user()->division == "Sysadmin")
          <li class="">
            <a href="{{route('index',['division'=>'Sysadmin'])}}" class="listactive"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif
          @if (Auth::user()->division == "User")
          <li class="">
            <a href="{{route('index',['division'=>'User'])}}" class="listactive"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_BA")
          <li>
            <a href="{{route('index',['division'=>'IT_BA'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_BAHead")
          <li>
            <a href="{{route('index',['division'=>'IT_BAHead'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

         

          @if (Auth::user()->division == "IT_Security")
          <li>
            <a href="{{route('index',['division'=>'IT_Security'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_SecurityHead")
          <li>
            <a href="{{route('index',['division'=>'IT_SecurityHead'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "SKMR")
          <li>
            <a href="{{route('index',['division'=>'SKMR'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "SKK")
          <li>
            <a href="{{route('index',['division'=>'SKK'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_AppsManager")
          <li>
            <a href="{{route('index',['division'=>'IT_AppsManager'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_Owner")
          <li>
            <a href="{{route('index',['division'=>'IT_Owner'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_PMO")
          <li>
            <a href="{{route('index',['division'=>'IT_PMO'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_SA")
          <li>
            <a href="{{route('index',['division'=>'IT_SA'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_Developer")
          <li>
            <a href="{{route('index',['division'=>'IT_Developer'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "IT_Infra")
          <li>
            <a href="{{route('index',['division'=>'IT_Infra'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          @if (Auth::user()->division == "BO")
          <li>
            <a href="{{route('index',['division'=>'BO'])}}"><i class="bx bx-envelope"></i><span>My Work</span></a>
          </li>
          @endif

          <li class="">
            <a href="{{ url('dashboard') }}"><i class="bx bx-server"></i><span>Dashboard</span></a>
          </li>

          @if (Auth::user()->division == "User")
          <li>
            <a href="{{action('req_gatheringController@create')}}"><i class="bx bx-file-blank"></i><span>Request New Project</span></a>
          </li>

          <li>
            <a href="{{ url('dropProject') }}"><i class="bx bx-file-blank"></i><span>Request Drop Project</span></a>
          </li>
          @endif

          <li>
            <a href="{{ url('searchProject') }}"><i class="bx bx-book-content"></i><span>Search project</span></a>
          </li>

          @endif
          



          <li>
          <h1>--------------</h1>
          </li>
          
          <li>
          <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bx bx-user"></i><span>
                                        {{ __('Logout') }} </span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>
         </li>
          
          @endguest

        </ul>
      </nav><!-- .nav-menu -->
      
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->




  <!-- ======= Content Section ======= -->
  <section id="content">
    <div class="content-container" data-aos="fade-in">
  
      @yield('content')
  
    </div>
  </section><!-- End Content -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
   
  </footer><!-- End  Footer -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/typed.js/typed.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>

<script>

var selector = '#header .nav-menu ul li';

$(selector).on('click', function(){
    $(selector).removeClass('active');
    $(this).addClass('active');
});




</script>

