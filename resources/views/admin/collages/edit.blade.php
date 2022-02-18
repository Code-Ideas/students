<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات الكلية')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.collages.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-building"></i>
        </span>
        <span>قائمة الكليات</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($collage,['method' => 'PATCH', 'files' => true, 'url' => route('admin.collages.update', $collage->id)]) !!}
      @include('admin.collages._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


