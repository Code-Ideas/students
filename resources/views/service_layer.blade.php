@extends('layouts.app')
@section('content')
@section('page.title', $services->name)
<link rel="stylesheet" type="text/css" href="/front/css/home.css">

@endsection
<body class="service_body">

<div class="bg-light container container-2">
</br>
</br>
 <h1 class="text-center  text-dark ">{{$services->name}}</h1> 
 <div class='container contain_service p-5' >
   <div></div>
 @foreach($services->layers as $layer)
 <div class="text-dark text-right">{!!$layer->content!!}</div>
 <div class="p-4">
 @foreach($layer->attachments as $att)
 @if ($att->type=='file')

 <a style="color:black;" class="btn btn-block btn-outline-primary"  href="{{$att->path}}" >{{$att->file_name}} </a>
 @elseif($att->file_name=='image')
 <img src="{{$att->path}}">

 @elseif($att->file_name=='video')
 <video width="500" height="240" controls>
  <source src="movie.mp4" type="video/mp4">

</video>
@endif



 @endforeach
</div>



@endforeach

</div>
</br>
</br>
<div>
<body>
