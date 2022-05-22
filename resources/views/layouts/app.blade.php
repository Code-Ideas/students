<!doctype html>


<html lang="en" class="no-js">
<head>
    <title>خدمات الطلاب | @yield('page.title') </title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous">

	<link rel="stylesheet" href="/front/css/studiare-assets.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/fonts/iconfont/material-icons.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/front/css/style.css">
	<link rel="stylesheet" type="text/css" href="/front/css/rtl.css">

</head>
<body style="
  font-family:Raleway">

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">
			<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
				<div class="container">
					<a class="navbar-brand" href="{{route('home')}}">
						<img src="/images/university.jpg"  width="80px" alt="">البوابة الالكترونية لخدمة طلاب جامعة بورسعيد
					</a>
					<a href="#" class="mobile-nav-toggle">
						<span></span>
					</a>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
                            <li>
                                <a href="{{ route('notifications') }}">
                                    @if(count(auth()->user()->newNotifications()))
                                        <span class="badge badge-light">{{ count(auth()->user()->newNotifications()) }}</span>
                                        <i class="fas fa-bell"></i>
                                    @else
                                        <i class="fas fa-bell"></i>
                                    @endif
                                </a>
                            </li>
						</ul>
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
				</div>
                </div>
			</nav>
            <div class="mobile-menu">
                <nav class="mobile-nav">
                    <ul class="mobile-menu-list">
                    </ul>
                    <ul>
                   <li> <a href="{{route('e-books')}}" class="text-dark mt-2 "><i
                      class="fas fa-file-pdf-o fa-fw me-3 text-primary pl-2"></i><span>الكتب الالكترونية</span></a></li>
				@foreach($services as $service)
                @if($service->type=='page')
                     <li> <a href="{{ route('showService', $service->id)}}" class="text-dark mt-2"><i
                      class="fa fa-table fa-fw me-3 text-primary pl-2"></i><span>{{$service->name}}</a></li>
            @else
             <li> <a href="{{$service->link}}" target="_blank" class="text-dark mt-2"><i
              class="fa fa-link fa-fw me-3 text-primary pl-2"></i><span>{{$service->name}}</a></li>
            @endif
            @endforeach
                <li>  <a href="{{route('complain')}}" class="text-dark mt-2"><i
                      class="fa fa-edit fa-fw me-3 text-primary pl-2 "></i><span>الشكاوي</span></a></li>
                <li>  <a href="{{route('clinic')}}" class="text-dark mt-2"><i
                      class="fas fa-stethoscope fa-fw me-3 text-primary pl-2"></i><span>العيادة الطبية</span></a></li>
                     <li> <a href="{{route('illiteracy')}}" class="text-dark mt-2">
                    <i class="fas fa-book-open fa-fw me-3 text-primary pl-2"></i><span>محو الامية</span>
                  </a></li>
                  <li><a href="{{route('news')}}" class="text-dark mt-2">
                    <i class="fas fa-newspaper fa-fw me-3 text-primary pl-2"></i><span>مركز الاخبار</span>
                  </a></li>
                    <li>
                        <a href="{{ route('notifications') }}" class="text-dark mt-2">
                            <i class="fas fa-bell fa-fw me-3 text-primary pl-2"></i><span>الاشعارات</span>
                        </a>
                    </li>
                  <li><a href="{{ route('logout') }}" class="text-dark register-modal-opener"
                               onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
		<!--Main Navigation-->
            <!-- Sidebar -->
            <nav id="sidebarMenu" class=" d-lg-block sidebar collapse bg-white ml-4 fixed-right">
              <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 ">
				<a href="{{route('e-books')}}" class="list-group-item list-group-item-action py-2 ripple  mt-5 "><i
                      class="fas fa-file-pdf-o fa-fw me-3 text-primary pl-2"></i><span>الكتب الالكترونية</span></a>
				@foreach($services as $service)
                @if($service->type=='page')
                      <a href="{{ route('showService', $service->id)}}" class="list-group-item list-group-item-action py-2 ripple"><i
                      class="fas fa-user-graduate fa-fw me-3 text-primary pl-2"></i><span>{{$service->name}}</a>
            @else
              <a href="{{$service->link}}" target="_blank" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fa fa-link fa-fw me-3 text-primary pl-2"></i><span>{{$service->name}}</a>
            @endif
            @endforeach
                  <a href="{{route('complain')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                      class="fa fa-edit fa-fw me-3 text-primary pl-2"></i><span>الشكاوي</span></a>
                  <a href="{{route('clinic')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                      class="fas fa-stethoscope fa-fw me-3 text-primary pl-2"></i><span>العيادة الطبية</span></a>
                      <a href="{{route('illiteracy')}}" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-book-open fa-fw me-3 text-primary pl-2"></i><span>محو الامية</span>
                  </a>
                  <a href="{{route('news')}}" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-newspaper fa-fw me-3 text-primary pl-2"></i><span>مركز الاخبار</span>
                  </a>
                </div>
              </div>
            </nav>
<div class="content">
      @yield('content')
</div>

      <div class="bg-light text-center p-3 fixed-bottom text-dark ">@coptright 2021</div>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script src="/front/js/studiare-plugins.min.js"></script>
	<script src="/front/js/popper.js"></script>
	<script src="/front/js/bootstrap.min.js"></script>
	<script src="/front/js/script.js"></script>
</body>
</html>
