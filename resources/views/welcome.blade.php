
<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>لبوابه الالكترونيه لخدمه طلاب جامعه بورسعيد</title>

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

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">

					<a class="navbar-brand" href="{{route('home')}}">
						<img src="/images/university.jpg"  width="80px"alt="">البوابه الالكترونيه لخدمه طلاب جامعه بورسعيد
					</a>

					<a href="#" class="mobile-nav-toggle"> 
						<span></span>
					</a>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="drop-link">
								<a class="active" href="{{route('home')}}">الصفحه الرئيسيه</a>
							</li>
							
							
							
						</ul>
						<a href="#" class="register-modal-opener login-button"><i class="material-icons">perm_identity</i>   <?php echo e(Auth::user()->name); ?></a>
					</div>
				</div>
			</nav>

			
			</div>

		</header>
        
<div class="dark-overlay">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100 bg-dark" src="{{asset('images/uni.jpg')}}" alt="First slide" height="400px" >
            </div>
</div>
    </div>

</div>
</div>
</div>
</div>
</div>
<div class="container ">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                <marquee class="news-scroll" behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();"> @foreach($posts as $post)<a  href="{{route('singleNews',$post->id)}}"> 
                    {{$post->title}}
                    
                
                </a>
                &nbsp;
                <span class="dot "></span> 
                &nbsp;
                @endforeach
                 </a> </marquee>
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-primary py-2 text-white px-1 news"><span class="d-flex align-items-center p-2">&nbsp;اخر الاخبار</span></div>

            </div>
        </div>
    </div>
</div>
		<!-- End home section -->

		<!-- feature-section 
			================================================== -->
		<section class="feature-section">
			<div class="container">
				<div class="feature-box">
					<div class="row">
                    @foreach($services as $service)
   
                 @if($service->type=='page')
						<div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<i class="fa fa-table"></i>
								</div>
								<div class="feature-content">
									<a href="{{route('services',['year_id'=>Auth::user()->year_id,'department_id'=>Auth::user()->department_id,'service_id'=>$service->id])}}"><h2>
                                    {{$service->name}} 									</h2></a>
								</div>
							</div>
						</div>
                        @else
                        <div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<i class="fa fa-link"></i>
								</div>
								<div class="feature-content">
									<a href="{{$service->link}}"><h2>
                                    {{$service->name}} 									</h2></a>
								</div>
							</div>
						</div>
                        @endif
                        @endforeach
                        <div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<i class="fa fa-table"></i>
								</div>
								<div class="feature-content">
									<a href="{{route('services',['year_id'=>Auth::user()->year_id,'department_id'=>Auth::user()->department_id,'service_id'=>$service->id])}}"><h2>
                                    {{$service->name}} 									</h2></a>
								</div>
							</div>
						</div>
                        <div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<i class="fas fa-times"></i>
								</div>
								<div class="feature-content">
									<a href="{{route('complain')}}"><h2>
                                   الشكاوي									</h2></a>
								</div>
							</div>
						</div>
                        <div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
                                <i class="fas fa-hospital"></i>								</div>
								<div class="feature-content">
									<a href="{{route('clinic')}}"><h2>
                                   العياده الطبيه								</h2></a>
								</div>
							</div>
						</div>
                        <div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<i class="fas fa-mobile"></i>
								</div>
								<div class="feature-content">
									<a href="{{route('phoneDownload')}}"><h2>
                                   تحميل التطبيق								</h2></a>
								</div>
							</div>
						</div>   <div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<i class="fas fa-book"></i>
								</div>
								<div class="feature-content">
									<a href="{{route('electronicbook')}}"><h2>
                             الكتب الالكترونيه							</h2></a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- End feature section -->

		
		


		<!-- footer 
			================================================== -->
		<footer>
			<div class="container">

				<div class="up-footer">
					<div class="row">

						
						<div class="col-lg-6 col-md-6">
							<div class="footer-widget quick-widget">
								<h2>Quick Links</h2>
								<ul class="quick-list">
                              <li>  <a  href="http://eng.psu.edu.eg/images/stories/new_images/2018/5/%D8%A7%D9%84%D8%AA%D8%B9%D9%84%D9%8A%D9%85%D8%A7%D8%AA_%D8%A7%D9%84%D8%B9%D8%A7%D9%85%D8%A9_%D9%88%D8%A7%D9%84%D8%A5%D8%B1%D8%B4%D8%A7%D8%AF%D8%A7%D8%AA_%D8%A7%D9%84%D9%82%D8%A7%D9%86%D9%88%D9%86%D9%8A%D8%A9_%D9%84%D8%A3%D8%B9%D9%85%D8%A7%D9%84_%D8%A7%D9%84%D8%A5%D9%85%D8%AA%D8%AD%D8%A7%D9%86%D8%A7%D8%AA.pdf">حقوق وإلتزامات الطلاب </a></li>
                    <li >
                        <a  href="https://drive.google.com/file/d/1dWct_LzoHiQ24b9WtkmrkFPfwUwyRSeN/view"> دليل الطالب </a> </li>
                    <li ><a  href="https://drive.google.com/file/d/1Fbp3N6eAx199ScZOmVxmV-hglosstNgs/view"> دليل نظام الامتحانات واعمال الكنترول </a></li>
                    <li ><a   href="https://drive.google.com/file/d/1Fbp3N6eAx199ScZOmVxmV-hglosstNgs/view"> دليل نظام الامتحانات واعمال الكنترول</a></li>
                    <li ><a   href="https://drive.google.com/file/d/1zwoef-kS5ebZnB_ypv_BRta28PbJsZhj/view"> دليل التدريب الميداني </a></li>
                    <li ><a   href="https://drive.google.com/file/d/19QTi3fbNpmT8Y3f6QYk8sOtAB9EsaXtW/view"> الخطة الاستراتيجية للكلية </a></li>
                    <li ><a   href="https://drive.google.com/file/d/1p9KFGQgGDvvh7GmTjZF2R9PcJmR2CzFC/view"> دليل الابنيه والمنشئات </a></li>



								</ul>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget subscribe-widget">
								<h2>Our Location</h2>
								<iframe
									width="400"
									height="200"
									style="border:0"
									loading="lazy"
									allowfullscreen
									src="https://maps.google.com/maps?q=port%20said%20university&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near">
								</iframe>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="footer-copyright copyrights-layout-default">
				<div class="container">
					<div class="copyright-inner">
						<div class="copyright-cell"> &copy; 2022 <span class="highlight">@copyright</div>
						<div class="copyright-cell">
						</div>
					</div>
				</div>
			</div>

		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->

	
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
