@extends('layouts.app')
@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet" type="text/css">

<title>العياده الطبيه</title>
 

  </head>

  <body  >
  <div class="head">
<h1 class="text-dark p-5 text-center my-5 ">  التسجيل في العياده الطبيه</h1>
<div>
  <div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          

          <div class="row justify-content-center">
            <div class="col-md-6">
              

            <!-- <p><img src="{{asset('images/undraw-contact.svg')}}" alt="Image" class="img-fluid"></p> -->
            <p><img src="/images/hospital.jpg" alt="Image" class="img-fluid"></p>


            </div>
            <div class="col-md-6 body-form">
              
              <form class="mb-5" action="{{route('storeClinic')}}" id="contactForm" name="contactForm" >
                @csrf
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="البريد الالكتروني...." Required>
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
               
				
				<div class="row">
                  <div class="col-md-12 form-group">
				  <input id="phone" class="form-control" type="text" name="phone" placeholder="رقم الهاتف....." required>      
          @error('phone')
                    <div class="text-danger">{{$message}}</div>
                    @enderror            </div>
                </div>  


                <div class="field is-horizontal">
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                    {!! Form::select('medical_department_id', $medicaldepartments, null, ['required','placeholder' => "قسم التشخيص"]) !!} 
                    @error('medical_department_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />    
       <div class="field is-horizontal">
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                    {!! Form::select('collage_id', $collages, null, ['required','placeholder' => "faculty"]) !!} 
            @error('collage_id')
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
                  <div class="col-12">
                    <input type="submit" value="Send Message" class="btn btn-dark rounded-0  px-4">
                  <span class="submitting"></span>
                  </div>
                </div>
              </form>

          </div>


    

	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
  </body>
</html>

