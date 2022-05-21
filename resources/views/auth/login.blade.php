<!doctype html>
<html lang="en" class="no-js">
<head>
    <title>خدمات الطلاب | تسجيل الدخول</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/front/css/loginForm.css" rel="stylesheet" >
</head>
<body>
<!-- Container -->
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="/images/university.jpg" id="icon" alt="خدمات الطلاب"/>
                <h1 class="text-primary">تسجيل الدخول</h1>
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
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="الرقم السري">
                @error('password')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror
                <input type="submit" class="fadeIn fourth" value="تسجيل الدخول">
            </form>
        </div>
    </div>
</body>
</html>
