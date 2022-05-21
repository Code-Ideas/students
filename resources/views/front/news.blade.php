@extends('layouts.app')
@section('page.title', 'مركز الاخبار')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
<link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="/front/css/news.css">

<style>
</style>
</head>
<body>
<div class=" content " >
<div class="row">
    <div class="col-md-12 ">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
			<div class="carousel-inner">
				<div class="item carousel-item active">
					<div class="row p-5">
                        @foreach($posts as $post)
						<div class="col-sm-12 box col-md-6 col-lg-3 mr-3">
							<div class="">
								<div class="img-box">
									<img src="{{$post->image}}" class="img-fluid" alt="image" >
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
    </div>
</div>
</div>
</body>
</html>
