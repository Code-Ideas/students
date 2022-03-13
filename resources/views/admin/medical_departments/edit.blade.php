<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات القسم')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.medical_departments.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-stethoscope"></i>
        </span>
        <span>قائمة أقسام العيادة</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($medical_department,['method' => 'PATCH', 'files' => true, 'url' => route('admin.medical_departments.update', $medical_department->id)]) !!}
      @include('admin.medical_departments._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


