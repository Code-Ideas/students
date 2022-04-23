<!doctype html>


<html lang="en" class="no-js">
<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous">
	
	<link rel="stylesheet" href="/front/css/studiare-assets.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/fonts/elegant-icons/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/fonts/iconfont/material-icons.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/front/css/style.css">
	<link rel="stylesheet" type="text/css" href="/front/css/rtl.css">

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
				<div class="container">

					<a class="navbar-brand" href="{{route('home')}}">
						<img src="/images/university.jpg"  width="80px"alt="">البوابه الالكترونيه لخدمه طلاب جامعه بورسعيد
					</a>

					<a href="#" class="mobile-nav-toggle"> 
						<span></span>
					</a>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="drop-link" style="list-style:none">
								<a class="active" href="{{route('home')}}">الصفحه الرئيسيه</a>
							</li>
							
							
							
						</ul>
						@guest
                        <a href="{{ route('login') }}" class="register-modal-opener login-button text-white"><i class="material-icons">perm_identity</i>الطلاب</a>
                        @else
                            <li class="drop-link login-button">
                                <a href="#" class="text-white">{{ str_limit(auth()->user()->name, 20) }} <i class="material-icons">perm_identity</i><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('logout') }}"
                                           class="register-modal-opener"
                                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            {{ csrf_field() }}
                                        </form></li>
                                </ul>
                            </li>
                        @endguest
				</div>
			</nav>

			
			</div>

		</header>

      @yield('content')
     
      <div class="bg-light text-center p-3 fixed-bottom text-dark ">@coptright 2021</div> 

      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <script>
        
        </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
<script src="/front/js/studiare-plugins.min.js"></script>
	<script src="/front/js/jquery.countTo.js"></script>
	<script src="/front/js/popper.js"></script>
	<script src="/front/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="/front/js/gmap3.min.js"></script>
	<script type="text/javascript" src="/front/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="/front/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="/front/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="/front/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="/front/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="/front/js/script.js"></script>

	<script>

	
</body>
</html>
