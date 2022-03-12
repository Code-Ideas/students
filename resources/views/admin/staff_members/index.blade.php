<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'أعضاء هيئة التدريس')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <a href="{{ route('admin.staff_members.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
                <span>اضافة عضو هيئة التدريس</span>
            </a>
        </div>
        <!-- End Card Header -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الالكتروني</th>
                        <th>الكلية</th>
                        <th>عدد الكتب</th>
                        <th>الحالة</th>
                        <th>الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staffMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->collage ? $member->collage->name : ' - - ' }}</td>
                        <td>{{ $member->e_books_count }}</td>
                        <td>{{ $member->active ? 'مفعل' : 'غير مفعل' }}</td>
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.staff_members.edit', $member->id) }}"> تعديل </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer with-pagination">
            {{ $staffMembers->links('vendor.pagination.bulma') }}
        </div>
    </div>
    <!-- End Card -->
@endsection
<!-- End Content Section -->
