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

    <!-- Material Design fonts & icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Styles/Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Material Design -->
    <link href="/css/material-dashboard.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="@yield('body')">
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="/images/backgrounds/stacks.jpg">

            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->

            <div class="logo">
                <a href="/" class="simple-text">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="@yield('dashboard')">
                        <a href="{{ url('/admin/home') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="@yield('categories')">
                        <a href="{{ route('categories.index') }}">
                            <i class="material-icons">assignment</i>
                            <p>Categories</p>
                        </a>
                    </li>

                    <li class="@yield('books')">
                        <a href="{{ route('books.index') }}">
                            <i class="material-icons">book</i>
                            <p>Books</p>
                        </a>
                    </li>

                    <li class="@yield('report')">
                        <a href="{{ route('report.index') }}">
                            <i class="material-icons">assessment</i>
                            <p>Report</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">@yield('nav_title')</a>
                        @yield('button')
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            {{-- <li>
                                <a href="/home" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li> --}}
                            <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">notifications</i>
                                        @if (5+5==1)
                                            <span class="notification">{{--  --}}</span>
                                        @endif
                                        <p class="hidden-lg hidden-md">Notifications</p>
                                  </a>
                                  {{-- <ul class="dropdown-menu">
                                    <li><a href="#">....</a></li>
                                    <li><a href="#">.....</a></li>
                                    <li><a href="#">......</a></li>
                                  </ul> --}}
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <i class="material-icons">person</i>
                                   <span>{{ Auth::user()->name }}</span> <span class="caret"></span>
                               </a>
                               <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i><div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @include('layouts._flash')
                        @yield('content')
                        @yield('modal')
                    </div>
                </div>
            </div>
            @include('layouts.subviews.footer-dashboard')
        </div>
    </div>

</body>

    <!--   Core JS Files   -->
    <script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/material.min.js" type="text/javascript"></script>
    
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="/js/material-dashboard.js"></script>

    <!--   Other Scripts   -->
    @yield('scripts')

</html>
