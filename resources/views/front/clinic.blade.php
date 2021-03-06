@extends('layouts.app')
@section('page.title', 'العيادة الطبية ')
@section('content')

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
<link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="head">
      <br>
      <br>
    <h1 class="text-dark p-5 text-center my-5 ">  التسجيل في العيادة الطبية</h1>
        <div class="content">
            <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="row justify-content-center">
                <div class="col-md-6">
                <p><img src="/images/hospital.jpg" alt="Image" class="img-fluid"></p>
                </div>
                <div class="col-md-6 body-form">
                  <form class="mb-5" action="{{route('storeClinic')}}" id="contactForm" name="contactForm" >
                    @csrf
                    <div class="row">
                      <div class="col-md-12 form-group">
                      <input id="phone" class="form-control" type="text" name="phone" placeholder="رقم الهاتف....." required>
                        @error('phone')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="field is-horizontal">
                    <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                        {!! Form::select('medical_department_id', $medicalDepartments, null, ['required','placeholder' => "اختيار القسم الطبي"]) !!}
                        @error('medical_department_id')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                    </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-12 form-group">
                        <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="اكتب رسالتك" Required></textarea>
                        @error('message')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-left">
                        <input type="submit" value="ارسال" class="btn btn-dark rounded-0  px-4">
                      </div>
                    </div>
                  </form>
              </div>

              </div>
        </div>
  </div>
        </div>
        @if(count($reservations))
            <div class="container">
                <div class="teacher-content">
                    <div class="row">
                        <div class="col-lg-10" style="padding-right:75px;">
                            <table class="table table-striped pt-5">
                                <thead>
                                <tr>
                                    <th scope="col">القسم الطبي</th>
                                    <th scope="col">موعد الحجز</th>
                                    <th scope="col"> ملاحظات </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->medicalDepartment ? $reservation->medicalDepartment->name : ' - - ' }}</td>
                                        <td>{{ $reservation->reservation_date ?: 'لم يتم تحديد موعد' }}</td>
                                        <td>{{ $reservation->notes ?: ' - - ' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $reservations->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
    @endif
        </div>
  </div>



</body>
</html>

