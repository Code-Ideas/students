<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل بيانات المشرف')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header">
            <a href="{{ route('admin.supervisors.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-user-lock"></i>
        </span>
                <span>قائمة المشرفين</span>
            </a>
        </div><!-- End Card Header -->
        <!-- Start Form -->
    {!! Form::model($supervisor,['method' => 'PATCH', 'files' => true, 'url' => route('admin.supervisors.update', $supervisor->id)]) !!}
    @include('admin.supervisors._form')
    {!! Form::close() !!}
    <!-- End Form -->
    </div><!-- End Card -->
@endsection<!-- End Content Section -->
