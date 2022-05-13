


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="/front/css/loginForm.css" rel="stylesheet" >
    
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>تسجيل الدخول</title>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="/images/university.jpg" id="icon" alt="User Icon" />
      <h1 class="text-primary">                   تسجيل الدخول
</h1>
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
    
    @csrf

      <input type="text" id="login" class="fadeIn second" name="email" placeholder="البريد الالكتروني">
      @error('email')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="الرقم السري">
      @error('password')
                        <p class="mt-4 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
      <input type="submit" class="fadeIn fourth" value="تسجيل الدخول">
    </form>

    

  </div>
</div>