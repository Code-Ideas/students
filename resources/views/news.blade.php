@extends('layouts.app')
@section('page.title', 'مركز الاخبار')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/front/css/news.css">

<style>

</style>
</head>
<body>
<div class="container-xl " >
	<div class="row">
		<div class="col-md-12 ">
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
			<div class="carousel-inner">
				<div class="item carousel-item active">
					<div class="row pt-5">
                        @foreach($posts as $post)

						<div class="col-sm-12 box col-md-6 col-lg-3 ">
							<div class="">
								<div class="img-box">
									<img src="{{$post->image}}" class="img-fluid" alt="image">
								</div>
								<div class="thumb-content">
									<h4>{{$post->title}}</h4>									
								
									<p class="item-price">{{$post->created_at}}</p>
									<a href="{{route('singleNews',$post->id)}}" class="btn   btn-rounded  px-5   illiteracy_button  pos">اقرا المزيد</a>
								</div>						
							</div>
						</div>		
                        @endforeach
		</div>
		</div>
	</div>
</div>
</body>
</html>                                		