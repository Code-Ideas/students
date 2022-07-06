@extends('layouts.app')
@section('page.title', 'من نحن')
@section('content')

<link rel="stylesheet" href="/front/css/about_us.css">

<h1>فريق العمل</h1>
<h4>طلبة كلية هندسة جامعة بورسعيد بمساعدة مركز تكنولوجيا المعلومات</h4>

<div class="container mx-auto mt-4">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
    <img src="{{asset('images/ahmed.jpeg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="name">
      <h5 class="card-title">Ahmed Ali Gad</h5>
        </div>
      <div class="role">
          <h6 class="card-subtitle mb-2 text-muted">Back-End Developer</h6>
      </div>
    </div>
    </div>
      </div>
         <div class="col-md-4">
  <div class="card">
    <img src="{{asset('images/alaa.png')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="name">
      <h5 class="card-title">Alaa Ashraf Elsayed</h5>
        </div>
      <div class="role">
          <h6 class="card-subtitle mb-2 text-muted">Front-End Developer</h6>
      </div>
    </div>
    </div>
      </div>

    <div class="col-md-4">
  <div class="card">
    <img src="{{asset('images/bassant.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="name">
      <h5 class="card-title">Bassant Mohamed Shalaby</h5>
        </div>
      <div class="role">
          <h6 class="card-subtitle mb-2 text-muted">Back-End Developer</h6>
      </div>

    </div>
    </div>
    </div>

      <div class="col-md-4">
        <div class="card">
    <img src="{{asset('images/samah.jpg')}}"class="card-img-top" alt="...">
    <div class="card-body">
        <div class="name">
      <h5 class="card-title">Samah Ayman Nofal</h5>
        </div>
      <div class="role">
          <h6 class="card-subtitle mb-2 text-muted">Mobile Developer</h6>
      </div>

    </div>
    </div>
      </div>
         <div class="col-md-4">
  <div class="card">
    <img src="{{asset('images/sohaila.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="name">
      <h5 class="card-title">Sohaila Abd-Elmoneam Barakat</h5>
        </div>
        <div class="role">
              <h6 class="card-subtitle mb-2 text-muted">Mobile Developer</h6>
        </div>
    </div>
    </div>
     <br>
     <br>
     <br>
      </div>
    </div>
  </div>

@endsection


