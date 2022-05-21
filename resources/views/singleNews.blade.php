@extends('layouts.app')
@section('page.title', 'اخر الاخبار ')
@section('content')

<link rel="stylesheet" href="/front/css/singleNews.css">
<link rel="stylesheet" href="/front/css/rtl.css">
<body class="body_news">
<div>

    <div class="row">
        <div class="col-lg-7  news_content m-4 ">
        <h3 class="text-dark display pb-3  ">{{$post->title}}</h3>
        <div class="post-meta date text-danger ">
        <i class="fas fa-clock"></i> {{$post->created_at}}
					</div>

            <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                <!-- slides -->
                <div class="carousel-inner">
                <div class="carousel-item active"> <img src="{{$post->image}}"  alt="{{ $post->title }}" >  </div>

                    @foreach($post->images as $image)
                    <div class="carousel-item "> <img  src="{{ asset('storage/' . $image->path) }}"   alt="Hills"> </div>
                    @endforeach
                </div> <!-- Left right -->
                <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                <ol class="carousel-indicators list-inline">
                    <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="{{$post->image}}" class="img-fluid"> </a> </li>
                    @foreach($post->images as $image)
                    <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="{{ $image->id }}" data-target="#custCarousel"> <img src="{{ asset('storage/' . $image->path) }}"  class="img-fluid"> </a> </li>
                    @endforeach
                </ol>
            </div>
            <div class="text-dark text-right mt-5 pt-5">{!! $post->body !!}</div>

</div>


        <div class="col-md-4 text-dark ">
        <div class="page-content page-container mt-5" id="page-content">
    <div >
    <h4  >اخبار قد تهمك</h4>

        <div class="row">
        <div class="text-right">
</div>
            <div class="col-sm-6">


                <div class="list ">
                    <ul>
                 @foreach($posts as $post)
                    <div class="list-item row">
                        <!-- <div class="col-lg-2"><a href="{{route('singleNews',$post->id)}}"><span class="w-48 avatar "><img src="{{$post->image}}" class="rounded"/></span></a></div> -->
                        <div class="no-wrap col-lg-3"><li> <a href="{{route('singleNews',$post->id)}}"   class=" text-muted"><small>{{$post->title}}</small></a></li>
                        </div>

                    </div>
                    @endforeach
</ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    </div>
</div>
@endsection
