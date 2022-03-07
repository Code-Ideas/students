<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الاخبار')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header is-justify-content-space-between">
      <a href="{{ route('admin.posts.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
        <span>اضافة خبر</span>
      </a>
    </div><!-- End Card Header -->

    <!-- Start Card Content -->
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="posts">
          <thead>
          <tr>
            <th>صورة الخبر</th>
            <th>عنوان الخبر</th>
            <th>الاجراءات</th>
          </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
              <tr>
                <td><img src="{{ $post->image }}"></td>
                <td>{{ $post->title }}</td>
                <td>
                  <div class="buttons has-addons">
                    <a class="button is-info" href="{{ route('admin.posts.edit', $post->id) }}"> تعديل </a>
                      <a class="button is-warning" href="{{ route('admin.posts.show', $post->id) }}">معرض الصور</a>
                    <span class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $post->id }}" data_name="{{ $post->title }}" data-url="{{ route('admin.posts.destroy', $post->id) }}">حذف</span>
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
      {{ $posts->links('vendor.pagination.bulma') }}
    </div><!-- End Card Content -->
  </div><!-- End Card -->

  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->


