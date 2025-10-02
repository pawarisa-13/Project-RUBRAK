<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <title>Rubrak</title>
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
            <li class="menu"><a href="{{route ('pets.index')}}">Pet</a></li>
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


    <main>
        <div>
            <img src="{{ asset('Pic-rubrak/homepic.jpg') }}" alt="homepic" width="635" height="741" style="float: left; margin-right: 10px;">
        </div>
        <div class="home-content">
            <h1>Welcome to “Rub Rak”</h1> 
            <br>
            <div>
                <p>Every animal deserves a safe, loving home.
            Here, you’ll find loyal companions who are ready to bring joy, and warmth into your life.
            When you adopt, you’re not just giving an animal a home-you’re 
            opening your heart to a lifetime of unconditional love. </p>
            </div>
            <br>
            <a href="{{route ('pet.filter')}}"><button class="adopt-button">Adopt Now</button></a>
        </div>
    </main>
</body>
</html>
