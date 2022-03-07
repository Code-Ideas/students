<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'المشرفين')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <a href="{{ route('admin.supervisors.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
                <span>اضافة مشرف</span>
            </a>
        </div>
        <!-- End Card Header -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>اسم المشرف</th>
                        <th>البريد الالكتروني</th>
                        <th>القسم</th>
                        <th>الحالة</th>
                        <th>الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supervisors as $supervisor)
                    <tr>
                        <td>{{ $supervisor->name }}</td>
                        <td>{{ $supervisor->email }}</td>
                        <td>{{ $supervisor->department ? $supervisor->department->name : ' - - ' }}</td>
                        <td>{{ $supervisor->active ? 'مفعل' : 'غير مفعل' }}</td>
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.supervisors.edit', $supervisor->id) }}"> تعديل </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer with-pagination">
            {{ $supervisors->links('vendor.pagination.bulma') }}
        </div>
    </div>
    <!-- End Card -->
@endsection
<!-- End Content Section -->
