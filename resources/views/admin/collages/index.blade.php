<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الكليات')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.collages.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة كلية</span>
          </a>
      </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>اسم الكلية</th>
                        <th>ترتيب الكلية</th>
                        <th>حالة الكلية</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collages as $collage)
                        <tr>
                            <td>{{ $collage->name }}</td>
                            <td>{{ $collage->priority }}</td>
                            <td>{{ $collage->active ? 'مفعلة' : 'غير مفعلة' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.collages.edit', $collage->id) }}">
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
        {{ $collages->links('vendor.pagination.bulma') }}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
@endsection
<!-- End Content Section -->
