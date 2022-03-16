
@extends('layouts.app')
@section('content')

@endsection
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="/front/css/electronicbook.css" rel="stylesheet" />
<title>الكتاب الالكتروني</title>
<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
</br>
</br>
</br>                    
                </div>
            </div>
            <!-- /.col end-->
        </div>
        <!-- row end-->
        <div class="row p-5">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">تاريخ النشر</th>
                                        <th scope="col">اسم الكتاب</th>
                                        <th class="text-center" scope="col">الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    <tr class="inner-box">
                                        <th scope="row">
                                            <div class="event-date">
                                                <p>{{$book->created_at}}</p>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="text-dark">
                                               <p>{{$book->title}}</p>
                                            </div>
                                        </td>
                                       
                                       
                                        <td>
                                            <div class="primary-btn">
                                            <a class="btn btn-primary" href="storage/{{$book->path}}">عرض وتحميل الكتاب</a>
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
