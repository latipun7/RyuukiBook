<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png"> --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!-- Canonical SEO -->
    {{-- <link rel="canonical" href="#" /> --}}

    <!-- Material Design fonts & icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Styles/Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Material Design -->
    <link href="/css/material-kit.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="@yield('body')">
    <!-- Navbar will come here -->
    <nav class="@yield('navclass')">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::check())
                        {{-- <li><a href="{{ url('/home') }}">Dashboard</a></li> --}}
                    @endif
                    @role('admin')
                        <li><a href="{{ route('categories.index') }}"><i class="material-icons">dashboard</i> Dashboard</a></li>
                    @endrole
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group form-white">
                          <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-white btn-raised btn-fab btn-fab-mini"><i class="material-icons">search</i></button>
                    </form>

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="material-icons">fingerprint</i> Login</a></li>
                        <li><a href="{{ url('/register') }}"><i class="material-icons">person_add</i> Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    @yield('header')
    @yield('content')
    @yield('footer')

    <!--   Modal    -->
    @yield('modal')
    <!--  End Modal -->

</body>

    <!--   Core JS Files   -->
    <script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/material.min.js"></script>
    
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="/js/bootstrap-datepicker.js" type="text/javascript"></script>
    
    <!--    Plugin for Select Form control, full documentation here: https://github.com/FezVrasta/dropdown.js -->
    <script src="/js/jquery.dropdown.js" type="text/javascript"></script>

    <!--    Plugin for Product Gallery, full documentation here: https://9bitstudios.github.io/flexisel/ -->
    <script src="/js/jquery.flexisel.js"></script>

    <!--    Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
    <script src="/js/jquery.tagsinput.js"></script>

    <!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="/js/jasny-bootstrap.min.js"></script>

    <!-- Plugin For Google Maps -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="/js/material-kit.js" type="text/javascript"></script>

    <!--   Custom Scripts   -->
    @section('script')

</html>
