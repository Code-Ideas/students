
@extends('layouts.app')
@section('page.title', 'محو الاميه ')
@section('content')

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/fonts/icomoon/style.css">
<link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
<div class="mt-4 pt-5 text-center">
<blockquote class="blockquote">
  <p class="pt-5 text-center mt-5 "> يلزم علي كليه اداب وتربيه وتجاره استكمال اجراءات محو الاميه للتخرج وذلك بتسجل حد ادني خمسه متعلمين</p>
</blockquote>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert"
     style=" display:block ;margin:auto;width:30%;text-align:center">
        {{ session()->get('success') }} 
    </div>
    @endif

    @if($iliterates->count()<5)
        <div class="content">
            <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="row justify-content-center">
                <div class="col-md-6">
                <p><img src="{{asset('images/illiteracy.jpg')}}" alt="Image" class="img-fluid" width="300px"></p>
                </div>
                <div class="col-md-6 body-form">
                  <form class="mb-5" action="{{route('storeIlliteracy')}}" id="illiteracyForm" name="illiteracyForm" >
                    @csrf
                    <div class="row">
                      <div class="col-md-12 form-group">
                      <input id="name" class="form-control" type="text" name="name" placeholder="اسم المتعلم....." required>
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 form-group">
                      <input id="illiterate_id" class="form-control" type="text" name="illiterate_id" placeholder="الرقم القومي....." required>
                        @error('illiterate_id')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 form-group">
                      <input id="address" class="form-control" type="text" name="address" placeholder="عنوان المتعلم....." required>
                        @error('address')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12 form-group">
                    <div class="field is-horizontal">
                    <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
             {!! Form::select('classroom_type', array('energizing'=>'تنشيطي','free'=>'حر',
                'immediate_exam'=>'امتحان فوري'), null, ['required','placeholder' => "نوع الفصل"]) !!}
                        @error('classroom_type')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="field is-horizontal">
                    <div class="field-body">
                    <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
     {!! Form::select('classroom', array('mosque'=>'مسجد','home'=>'منزل',
     'association'=>'جمعيه','college'=>'كليه'), null, ['required','placeholder' => " مكان الفصل"]) !!}
                        @error('classroom_type')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                    </div>
                    </div>
</div>
</div>
                    <div class="row">
                      <div class="col-12 text-left">
                        <input type="submit" value="ارسال" class="btn btn-rounded px-5 my-4 btn-dark illiteracy_button">
                      </div>
                    </div>
                  </form>
              </div>
              </div>
        </div>
  </div>
        </div>
     </div>
        @endif
        <div class='content'>

        <div class=" ">
            <table class="table  table-striped pt-5 mr-5" style="padding-right:250px">
              <thead>
                <tr>
                  <th scope="col">الاسم</th>
                  <th scope="col">الرقم القومي</th>
                  <th scope="col">العنوان</th>
                  <th scope="col">نوع الفصل </th>
                  <th scope="col">مكان الفصل</th>
                </tr>
              </thead>
              <tbody>
                @foreach($iliterates as $iliterate)
                <tr>
                  <td>{{$iliterate->name }}</td>
                  <td>{{$iliterate->illiterate_id}}</td>
                  <td>{{$iliterate->address}}</td>
                  <td>{{$iliterate->classroom_type}}</td>
                  <td>{{$iliterate->classroom}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</body>
</html>

