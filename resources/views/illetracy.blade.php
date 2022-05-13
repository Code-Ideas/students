@extends('layouts.app')
@section('content')
@section('page.title', 'محو الاميه')


@endsection
<!DOCTYPE html>
<html>
   <head>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="/front/css/style.css">


      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <title>محو الاميه</title>
   </head>
   <body>
     <div class="mt-5 pt-5 text-center">
     <img src="{{asset('images/illiteracy.jpg')}}" height="150px" width="250px" class="pr-5 pt-4">
   </div>
     
     <div class=" text-center pt-2 text-muted">
يلزم علي طلبه الصف الرابع لكليه تجاره واداب وتربيه ملء تلك الاستماره للاستكمال اجراءات التخرج
</div>
     <div class="pt-5 container"  >
       @for($i =0 ;$i<6 ; $i++)
      <form class = "row " role = "form" style="padding-right:250px">
      <div class = "col-md-3  p-3  col-sm-3">
            <label class = "sr-only" for = "name">الاسم</label>
            <input type = "text" class = "form-control" id = "name" placeholder = "ادخل اسم المتعلم بالكامل">
            </div> <div class = "col-md-3 p-3 col-sm-3">
            <label class = "sr-only" for = "name">Age</label>
            <input type = "number" class = "form-control" id = "age" placeholder = "ادخل سن المتعلم">
         </div>  <div class = "col-md-5  p-3 col-sm-5">
            <label class = "sr-only" for = "name">العنوان</label>
            <input type = "text" class = "form-control" id = "address"  rows="100"placeholder = "ادخل العنوان">
         </div>
         
         </form>

 
@endfor
</div>
<div class="text-center">
<a href="#" class="btn   btn-rounded  px-5  my-4 btn-dark illiteracy_button">تاكيد المتعلمين</a>
<div>
</div>
   </body>
</html>