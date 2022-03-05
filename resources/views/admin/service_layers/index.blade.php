<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'محتوي '.$service->name)
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link button is-warning" href="#">اختيار نوع المحتوي</a>
                <div class="navbar-dropdown is-right-to-left notification-menu control">
                    <a class="notification-item" href="{{ route('admin.services.service_layers.create', [$service->id, 'content_type' => 'content']) }}">محتوي فقط</a>
                    <a class="notification-item" href="{{ route('admin.services.service_layers.create', [$service->id, 'content_type' => 'content_files']) }}">محتوي ومرفقات</a>
                    <a class="notification-item" href="{{ route('admin.services.service_layers.create', [$service->id, 'content_type' => 'files']) }}" >مرفقات فقط</a>
                </div>
            </div>
        </div><!-- End Card Header -->

        <!-- Start Card Content -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth" id="posts">
                    <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>الحالة</th>
                        <th>الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($layers as $layer)
                        <tr>
                            <td>{{ $layer->title }}</td>
                            <td>{{ $layer->active ? 'مفعل' : 'غير مفعل' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    @if($layer->content_type != 'content')
                                    <a class="button is-warning" target="_blank" href="{{ route('admin.services.service_layers.show', [$service->id, $layer->id]) }}">المرفقات</a>
                                    @endif
                                    <a class="button is-info" href="{{ route('admin.services.service_layers.edit', [$service->id, $layer->id]) }}"> تعديل </a>
                                    <span class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $layer->id }}" data_name="{{ $layer->title }}" data-url="{{ route('admin.services.service_layers.destroy', [$service->id, $layer->id]) }}">حذف</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- End Card Content -->

        <!-- Start Card Footer -->
        <div class="card-footer with-pagination">
            {{ $layers->links('vendor.pagination.bulma') }}
        </div><!-- End Card Content -->
    </div><!-- End Card -->

    <!-- Include Modals -->
    @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->

