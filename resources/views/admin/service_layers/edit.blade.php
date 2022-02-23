<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل المحتوي')
<!-- Start Content Section -->
@section('content')
<!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.services.service_layers.index', $service->id) }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-newspaper"></i>
          </span>
            <span>قائمة المحتوي</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($serviceLayer,['method' => 'PATCH', 'files' => true, 'url' => route('admin.services.service_layers.update', [$service->id, $serviceLayer->id])]) !!}
      @include('admin.service_layers._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
