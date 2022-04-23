@extends('layouts.app')
@section('content')
@section('page.title', 'محو الاميه')


@endsection
<!DOCTYPE html>
<html>
   <head>
      <title>Bootstrap Example</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   </head>
   <body>
     <div class="mt-5 pt-5">
     <h1 class="display-1 text-center">العنوان</h1></div>
     <div class=" text-center">
  <p >يلزم علي طلبه الصف الرابع لكليه تجاره واداب وتربيه ملء تلك الاستماره للاستكمال اجراءات التخرج</p>
</div>
     <div class="pt-5 container"  >
       @for($i =0 ;$i<6 ; $i++)
      <form class = "row" role = "form">
      <div class = "col-md-3  p-3">
            <label class = "sr-only" for = "name">الاسم</label>
            <input type = "text" class = "form-control" id = "name" placeholder = "Enter Full Name">
            </div> <div class = "col-md-3 p-3">
            <label class = "sr-only" for = "name">Age</label>
            <input type = "number" class = "form-control" id = "age" placeholder = "Enter Age">
         </div>  <div class = "col-md-3  p-3">
            <label class = "sr-only" for = "name">العنوان</label>
            <input type = "text" class = "form-control" id = "address"  rows="100"placeholder = "ادخل العنوان">
         </div>
         
         <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
  <label class="custom-control-label" for="defaultInline1">ذكر</label>
</div>

<!-- Default inline 2-->
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
  <label class="custom-control-label" for="defaultInline2">انثي</label>
</div>

@endfor
      </form>
</div>
   </body>
</html>