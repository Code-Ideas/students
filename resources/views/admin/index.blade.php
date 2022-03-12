<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الرئيسية')
<!-- Start Content Section -->
@section('content')
    @if(auth()->guard('admin')->user()->role == 'super_admin')
    <div class="columns is-multiline">
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-link">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fas fa-book"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">الكتب الالكترونية</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\EBook::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.books.index') }}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-danger">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-user-tie"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">هيئة التدريس</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\Admin::where('role', 'staff')->count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.admins.index') }}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-building"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">الكليات</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\Collage::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.collages.index') }}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-warning">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-sitemap"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">أقسام الكليات</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ \App\Models\Department::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.departments.index') }}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="columns is-multiline">
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-link">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fas fa-sitemap"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">الخدمات</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\Service::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.services.index') }}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-danger">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fas fa-user-lock"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">المشرفين</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\Admin::where('role', 'supervisor')->count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.supervisors.index') }}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-primary">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-newspaper"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">الاخبار</span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                            {{ \App\Models\Post::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.posts.index') }}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-3">
            <div class="flex-card">
                <div class="p-4 text-white has-background-warning">
                    <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <span class="has-text-white has-text-weight-bold">رسائل التواصل </span>
                </div>
                <div class="content">
                    <div class="card-title is-tile is-styled has-text-right">
                        <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ \App\Models\Contact::count() }}</div>
                    </div>
                    <div class="mt-2 more">
                        <a class="accent" href="{{ route('admin.contacts.index') }}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(auth()->guard('admin')->user()->role == 'staff')
        <div class="columns is-multiline">
            <div class="column is-3">
                <div class="flex-card">
                    <div class="p-4 text-white has-background-link">
                        <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fas fa-book"></i>
                        </span>
                        </div>
                        <span class="has-text-white has-text-weight-bold">الكتب الالكترونية</span>
                    </div>
                    <div class="content">
                        <div class="card-title is-tile is-styled has-text-right">
                            <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">
                                {{ \App\Models\EBook::whereStaffId(auth()->guard('admin')->id())->count() }}</div>
                        </div>
                        <div class="mt-2 more">
                            <a class="accent" href="{{ route('admin.e_books.index') }}">المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection<!-- End Content Section -->
