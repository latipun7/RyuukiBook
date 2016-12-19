<!doctype html>
<html lang="en">
<head>
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

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/css/material-bootstrap-wizard.css" rel="stylesheet" />
	<link href="/css/ext.css" rel="stylesheet" />

	<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('/images/backgrounds/wizard-bg.jpg')">
		<a href="/">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="/images/logo_small.jpg">
	            </div>
	            <div class="brand">
	                Ryuuki Bookstore
	            </div>
	        </div>
	    </a>

		<!--  Made by  -->
		<a href="#" class="made-with-mk">
			<div class="brand">LS</div>
			<div class="made-with">Made by <strong>Latif Sulistyo</strong></div>
		</a>

	    <!--   Big container   -->
	    @yield('content')

	    <div class="footer">
	        <div class="container text-center">
	             &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="https://www.facebook.com/ryuukibeat" target="_blank">Latif Sulistyo</a>
	        </div>
	    </div>
	</div>

</body>
	<!--   Core JS Files   -->
    <script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="/js/jquery.validate.min.js"></script>

	@yield('script')

</html>
