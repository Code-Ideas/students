<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل بيانات ')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header">
            <a href="{{ route('admin.staff_members.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-user-tie"></i>
        </span>
                <span>قائمة اعضاء هيئة التدريس</span>
            </a>
        </div><!-- End Card Header -->
        <!-- Start Form -->
    {!! Form::model($staffMember,['method' => 'PATCH', 'files' => true, 'url' => route('admin.staff_members.update', $staffMember->id)]) !!}
    @include('admin.staff_members._form')
    {!! Form::close() !!}
    <!-- End Form -->
    </div><!-- End Card -->
@endsection<!-- End Content Section -->
