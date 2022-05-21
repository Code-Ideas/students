@extends('layouts.app')
@section('page.title', $service->name)
@section('content')
<link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="/front/css/home.css">
<body class=" content">
     <div class="bg-light container container-2">
    <br>
    <br>
        <h1 class="text-center  text-dark ">{{ $service->name }}</h1>
        <div class="container contain_service p-5">
            <div></div>
         @foreach($layers as $layer)
         <div class="text-dark text-center">{!! $layer->content !!}</div>
         <div class="p-4">
         @foreach($layer->attachments as $attachment)
             @if ($attachment->type == 'file')
                <div class="text-center">
                 <a style="color:black;" class="btn btn-secondary btn-block"
                    href="{{ asset('storage/' . $attachment->path) }}"
                    download="{{ $attachment->file_name }}">{{ $attachment->file_name }} </a>
                </div>
             @elseif($attachment->type == 'image')
                <img src="{{ asset('storage/' . $attachment->path) }}">
             @elseif($attachment->type == 'video')
                <video width="500" height="240" controls>
                <source src="movie.mp4" type="video/mp4">
                </video>
            @endif
         @endforeach
        </div>
         @endforeach
    </div>
    </div>
</body>
