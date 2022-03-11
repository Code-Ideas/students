<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل الكتاب')
<!-- Start Content Section -->
@section('content')
<!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.e_books.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-book"></i>
        </span>
        <span>قائمة الكتب</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($eBook,['method' => 'PATCH', 'files' => true, 'url' => route('admin.e_books.update', $eBook->id)]) !!}
      @include('admin.e_books._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
