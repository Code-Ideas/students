<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الكتب الالكترونية')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
      <div class="card-header">
          <div>
                <span class="icon is-small">
                  <i class="fa fa-book"></i>
                </span>
              <span>قائمة الكتب </span>
          </div>
      </div><!-- End Card Header -->

    <!-- Start Card Content -->
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="books">
          <thead>
          <tr>
            <th>اسم الكتاب</th>
            <th>الكلية</th>
            <th>حالة النشر</th>
            <th>الاجراءات</th>
          </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
              <tr>
                <td>{{ $book->title }}</td>
                <td>{{ ($book->collage ? $book->collage->name : ' - - ').' - '.($book->department ? $book->department->name : '') }}</td>
                <td>{{ $book->published ? 'تم النشر' : 'في انتظار التأكيد'}}</td>
                <td>
                  <div class="buttons has-addons">
                    <a class="button is-primary" target="_blank" href="{{ route('admin.books.show', $book->id) }}"> عرض </a>
                    <a class="button is-warning" target="_blank" href="{{ route('admin.books.log', $book->id) }}"> السجل </a>
                    @if($book->published)
                        <span class="modal-open button is-danger" status-name="تأكيد الغاء النشر"  traget-modal=".deactivate-modal" data_id="{{ $book->id }}" data_name="{{ $book->title }}" data-url="{{ route('admin.books.destroy', $book->id) }}">الغاء النشر</span>
                    @endif
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
      {{ $books->links('vendor.pagination.bulma') }}
    </div><!-- End Card Content -->
  </div><!-- End Card -->

  <!-- Include Modals -->
  @include('admin.partials.deactivateModal')
@endsection<!-- End Content Section -->


