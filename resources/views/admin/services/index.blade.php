<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الخدمات')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.services.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة خدمة</span>
          </a>
      </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>اسم الخدمة</th>
                        <th>ترتيب الخدمة</th>
                        <th>حالة الخدمة</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->priority }}</td>
                            <td>{{ $service->active ? 'مفعلة' : 'غير مفعلة' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    @if($service->type == 'page')
                                        <a target="_blank" class="button is-success" href="{{ route('admin.services.service_layers.index', $service->id) }}">
                                            المحتوي </a>
                                    @endif
                                    <a class="button is-info" href="{{ route('admin.services.edit', $service->id) }}">
                                        تعديل </a>
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
        {{ $services->links('vendor.pagination.bulma') }}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
@endsection
<!-- End Content Section -->
