<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>My Laravel Ecommerce Site</title>

	<link href="{{ asset('/skins/skin_b/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('/skins/skin_b/css/scrolling-nav.css') }}" rel="stylesheet">
	<link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#page-top">Welcome to Shirtvana </a>
            </div>
                <ul class="nav navbar-nav">
             
                    <li>
                        <a class="" href=" {{ route('home') }}">Products</a>
                    </li>
                    <li>
                        <a class="" href="#services">Categories</a>
                    </li>
                     <li>
                        <a class="" href="#services">Blog</a>
                    </li>
                    <li>
                        <a class="" href="#about">About</a>
                    </li>
                    <li>
                        <a class="" href="#contact">Contact</a>
                    </li>
                     <li>
                        <a class="" href="">Login/Register</a>
                    </li>
                </ul>
        </div> <!-- /.container -->
    </nav>

       <!-- Main Content -->
    <div class="container" id="main-stage">
        <div class="row">
            <div class="col-lg-12">
	           @yield('content')
            </div>
        </div>
    </div>


	<!-- Scripts -->
	<script src="{{ asset('/vendor/jquery/jquery-2.1.4.min.js') }}"></script>
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

	<!--
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	-->

</body>
</html>
