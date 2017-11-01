<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<header>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BYOD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/whale.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('img/whale.ico') }}" type="image/x-icon" />
    <meta name = "format-detection" content = "telephone=no" />
    <meta name="description" content="BYOD">
    <meta name="keywords" content="BYOD-ADMIN">
    <meta name="author" content="kokyick">
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/camera.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">

	<script src="{{ asset('js/template/jquery.js') }}"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="{{ asset('js/template/jquery-migrate-1.2.1.js') }}"></script>
    <script src="{{ asset('js/template/superfish.js') }}"></script>
    <script src="{{ asset('js/template/jquery.mobilemenu.js') }}"></script>
    <script src="{{ asset('js/template/jquery.jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/template/jquery.ui.totop.js') }}"></script>
    <script src="{{ asset('js/template/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('js/template/jquery.equalheights.js') }}"></script>    

    <!-- index 4 -->
    <script src="{{ asset('js/template/forms.js') }}"></script>
	
</header>
<body>
   
<!--==============================header=================================-->
<header id="header">
 
    <!-- Styles -->
      <div class="container">
        <h1 class="navbar-brand navbar-brand_"><a href="{{ route('viewindex') }}"><img alt="Grill point" src="{{ asset('img/logo.png')}}"></a></h1>
      </div>
      <div class="menuheader">
          <div class="container">
            <nav class="navbar navbar-default navbar-static-top tm_navbar" role="navigation">
                <ul class="nav sf-menu">
				  @if((Session::has('token')))
					  <li><a href="{{ route('viewmenus') }}">Menu</a></li>
					  <li><a href="{{ route('getrestaurant') }}">Restaurant</a></li>
					  <li><a href="{{ route('viewcart') }}">Payments</a></li>
				  @endif
				  <li><a href="{{ route('login') }}">Account</a>
				      <ul>
						  @if((Session::has('token')))
							  <li><a href="{{ route('dologout') }}">logout</a></li>
						  @else
							  <li><img src="{{ asset('img/arrowup.png')}}" alt=""><a href="{{ route('login') }}">login</a></li>
							  <li><a href="{{ route('registration') }}">sign up</a></li>
						  @endif
					
                      </li>
                    </ul>
				  </li>
                </ul>
            </nav>
          </div>
      </div>

</header>
        @yield('content')

</body>
</html>



<!--==============================footer=================================-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 footercol">
                <ul class="social_icons clearfix">
                     <li><a href="#"><img src="{{ asset('img/follow_icon1.png')}}" alt=""></a></li>
                     <li><a href="#"><img src="{{ asset('img/follow_icon2.png')}}" alt=""></a></li>
                     <li><a href="#"><img src="{{ asset('img/follow_icon3.png')}}" alt=""></a></li>
                     <li><a href="#"><img src="{{ asset('img/follow_icon4.png')}}" alt=""></a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 footerlogo footercol">
                <a class="smalllogo2 logo" href="index.html"><img src="{{ asset('img/logofooter.png')}}" alt=""></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 footercol">
                <p class="footerpriv">&copy; 2017 BYOD SIT FYP <br/> 
				<a href="{{ route('viewterms') }}">Privacy Policy</a> <br/> 
				<a href="{{ route('viewfeedback') }}">Contact Admin</a>
				</p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/template/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/template/tm-scripts.js') }}"></script>
</body>
</html>