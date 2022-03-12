<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الكتب الالكترونية')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header is-justify-content-space-between">
      <a href="{{ route('admin.books.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
        <span>اضافة كتاب</span>
      </a>
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
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->


