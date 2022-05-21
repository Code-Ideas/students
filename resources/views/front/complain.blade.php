@extends('layouts.app')
@section('page.title', 'الشكاوي ')
@section('content')


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet" type="text/css">

    <!-- <link rel="stylesheet" href="/front/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/front/css/success.css">

  </head>
  <body >
<div class="head">
      <br>
      <br>
<h1 class="text-dark p-5 text-center my-5  "> تقديم شكوي</h1>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row justify-content-center">
            <div class="col-md-6">
              <p><img src="{{asset('images/undraw-contact.svg')}}" alt="Image" class="img-fluid"></p>
            </div>
            <div class="col-md-6 body-form">
              @csrf
              <form class="mb-5" action="{{route('storeComplain')}}" id="contactForm" name="contactForm" >
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="الاسم" Required>
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="البريد الالكتروني" Required>
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                  </div>
                </div>


				<div class="row">
                  <div class="col-md-12 form-group">
				  <input id="phone" class="form-control" type="text" name="phone" placeholder="رقم الهاتف" required>
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
                    {!! Form::select('admin_id', $admins, null, ['required','placeholder' => "قسم الشكوي"]) !!}
                    @error('admin_id')
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
                    <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="نص الشكوي" Required></textarea>
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
    </div>
</div>

  </body>
</html>
