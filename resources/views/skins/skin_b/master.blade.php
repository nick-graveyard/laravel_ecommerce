<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token()  }}">
    <meta name="_auth"  content="{{ Auth::check() }}">


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
  
  <!--Google Analytics-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-71700533-1', 'auto');
    ga('send', 'pageview');
  </script>

</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">

            <div class="navbar-header">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                     <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                 </button>
                <a class="navbar-brand" href=""> Welcome to Shirtvana </a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
             
                    <li>
                        <a class="" href=" {{ route('home') }}">Shop</a>
                    </li>
                    <li>
                        <a class="" href=" {{ route('categories') }}">Categories</a>
                    </li>
                     <li>
                        <a class="" href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li>
                        <a class="" href="{{ route('aboot') }}">About/Contact</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                      @if (Auth::check())
                        <li ><a href="{{ route('logout') }}">Logout </a></li>
                        <li>
                            <a href="{{ route('carts.index') }}">Cart(
                              <span id="cart_count">
                                {{count(Auth::user()->cart->items)}}
                              </span>
                              )
                            </a>
                        </li>
                        <li><a href="{{ route('account') }}">Account</a></li>
                      @else
                        <li ><a href="{{ route('login') }}">Login/Register</a></li>
                      @endif
                </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
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
  <script src="{{ asset('/vendor/bootbox/bootbox.min.js') }}"></script>
  <script src="{{ asset('/skins/skin_b/js/main.js') }}"></script>

	<!--
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	-->

</body>
</html>
