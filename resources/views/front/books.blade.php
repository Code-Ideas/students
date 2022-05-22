@extends('layouts.app')
@section('page.title', 'الكتب الالكترونية ')

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="/front/css/electronicbook.css" rel="stylesheet" />
<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <!-- /.col end-->
        </div>
        <!-- row end-->
        <div class="row p-3">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">اسم الكتاب</th>
                                        <th class="text-center" scope="col">الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    <tr class="inner-box">
                                        <td>
                                            <div class="text-dark">
                                               <p>{{ $book->title }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="primary-btn">
                                            <a class="btn btn-primary" download="{{ $book->title }}" href="{{ asset('storage/' . $book->path) }}">تحميل</a>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        <!-- /row end-->
    </div>
</div>
@endsection
