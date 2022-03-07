<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'اضافة مشرف')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header">
            <a href="{{ route('admin.supervisors.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-user-check"></i>
          </span>
                <span>قائمة المشرفين</span>
            </a>
        </div><!-- End Card Header -->
        <!-- Start Form -->
    {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.supervisors.store']]) !!}
    @include('admin.supervisors._form')
    {!! Form::close() !!}<!-- End Form -->
    </div><!-- End Card -->
@endsection<!-- End Content Section -->
