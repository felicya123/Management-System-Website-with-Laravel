<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project Management System') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Project Management System') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                @if (Auth::user()->division == "User")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'User'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_BA")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_BA'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_BAHead")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_BAHead'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "Sysadmin")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'Sysadmin'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_Security")
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_Security'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_SecurityHead")
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_SecurityHead'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "SKMR")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'SKMR'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "SKK")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'SKK'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif
                                @if (Auth::user()->division == "IT_AppsManager")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_AppsManager'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_Owner")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_Owner'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_PMO")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_PMO'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_SA")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_SA'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_Developer")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_Developer'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "IT_Infra")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'IT_Infra'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                @if (Auth::user()->division == "BO")
                                 <li class="nav-item">
                                    <a class="nav-link"  href="{{route('index',['division'=>'BO'])}}">
                                        My Work
                                    </a>
                                </li>
                                @endif

                                <li class="nav-item">
                                    <a class="nav-link"  href="{{ url('dashboard') }}">
                                        Dashboard
                                    </a>
                                </li>

                            @if(Auth::user()->division == "User")
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Req New Project
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{action('req_gatheringController@create')}}">
                                            Req New Project
                                        </a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link"  href="{{ url('dropProject') }}">
                                        Req Drop Project
                                    </a>
                             </li>
                            @endif
                             <li class="nav-item">
                                    <a class="nav-link"  href="{{ url('searchProject') }}">
                                        Search Project
                                    </a>
                             </li>

                             

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{  Auth::user()->fullname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                           
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> 
