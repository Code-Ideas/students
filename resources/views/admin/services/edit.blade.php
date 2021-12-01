<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات الخدمة')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.services.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-sitemap"></i>
        </span>
        <span>قائمة الخدمات</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($service,['method' => 'PATCH', 'files' => true, 'url' => route('admin.services.update', $service->id)]) !!}
      @include('admin.services._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


