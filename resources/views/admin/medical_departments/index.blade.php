<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'أقسام العيادة')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.medical_departments.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة قسم</span>
          </a>
      </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>اسم القسم</th>
                        <th>حالة القسم</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medical_departments as $medical_department)
                        <tr>
                            <td>{{ $medical_department->name }}</td>
                            <td>{{ $medical_department->active ? 'مفعلة' : 'غير مفعلة' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.medical_departments.edit', $medical_department->id) }}">
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
        {{-- {{ $medicaldepartment->links('vendor.pagination.bulma') }} --}}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
@endsection
<!-- End Content Section -->
