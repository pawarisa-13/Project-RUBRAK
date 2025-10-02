<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/donate.css') }}">
</head>
<body>
  <header>
        <div class="logo">
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}"  alt="imglogo">
            <p>Rubrak</p>
        </div>
        <div class="nav">     
        <ul>
            <li class="menu"><a href="{{route ('home')}}">Home</a></li>
            <li class="menu"><a href="{{route ('pet.filter')}}">Pet</a></li>
            <li class="menu"><a href="{{route ('donate')}}">Donate</a></li>
            <li class="menu"><a href="{{route ('contact')}}">Contact Us</a></li>
            </ul>
        </div>
        <div class="btn">
            @auth
            {{-- ถ้าล็อกอินแล้ว --}}
                <a href="{{route('profile')}}"><button class="btn-header">Hello!, {{ Auth::user()->name }}</button></a>
            @else
            {{-- ถ้ายังไม่ล็อกอิน --}}
            <a href="{{route('login')}}"><button class="btn-header">Sign In</button></a>
            <a href="{{route('register')}}"><button class="btn-header">Sign Up</button></a>
            @endauth
        </div>
    </header>

    <div class="donate-wrap">
        <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" alt="logo" width="110">
         <h2 class="donate-title">Donate Us</h2>
        <div class="qr-box">
            <img src="{{ asset('photo/Promptpay.webp') }}" alt="QR Code" class="qr-img">
        </div>
        <div class="donate-company">Rubrak Pet Care Co., Ltd.</div>
    </div>
    {{-- <div class="donate-wrap d-flex flex-column align-items-center justify-content-center text-center min-vh-100 py-5">
    <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" alt="Brand" width="110">
    <h2 class="donate-title">Donate Us</h2>
    <img src="{{ asset('photo/Promptpay.webp') }}" alt="QR Code" class="donate-qr">
    <div class="donate-company">Rubrak Pet Care Co., Ltd.</div>
  </div> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>