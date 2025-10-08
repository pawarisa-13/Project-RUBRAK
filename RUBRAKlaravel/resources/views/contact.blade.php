<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact.css')}}">
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
            <li class="menu"><a href="{{route ('pet.filter')}}">Pet</a></li>
            <li class="menu"><a href="{{route ('donate')}}">Donate</a></li>
            <li class="menu"><a href="{{route ('contact')}}">Contact Us</a></li>
            </ul>
        </div>
        <div class="btn">
            @auth
            {{-- ล็อกอินแล้ว --}}
                <a href="{{route('profile')}}"><button class="btn-header">Hello!, {{ Auth::user()->name }}</button></a>
            @else
            {{-- ยังไม่ล็อกอิน --}}
            <a href="{{route('login')}}"><button class="btn-header">Sign In</button></a>
            <a href="{{route('register')}}"><button class="btn-header">Sign Up</button></a>
            @endauth
        </div>
    </header>
        <div class="right">
            <aside>
                <img src="{{ asset('Pic-rubrak/condog.jpg') }}" alt="contactpic" width="635" height="741" style="float: right; margin-left: 10px;">
            </aside>
        </div>
        <section class="contact-context">
            <center>
                <h1>Contact Page</h1>
                <p>Every dog deserves a second chance. They are waiting
                    <br>patiently for someone to open their heart and home.</p>
            </center>
        </section>
        <article class="article">
            <div class="left-con">
            <div class="sub-contact">
            <h2>Address</h2>
            <p>123/2002 Moo 16 Mittapap Rd.,<br> Nai-Muang, Muang District, <br>Khon Kaen 40002,Thailand.</p>

            </div>
            <div class="sub-contact">
            <h2>General inquiries</h2>
            <p>rubrak@gamil.com <br>Phone : 089-785-9999</p>
            <p>maiyakrainlaw@kkumail.com <br>Phone : 099-999-9999</p>
            </div>
            <div class="sub-contact">
            <h2>Contact & interships</h2>
            <p>rubrak@gamil.com</p>
            </div>
            </div>
        
            <div class="social-contact">
            <h2>Follow us</h2>
            <div class="media">
                <a href="https://x.com/i/flow/login"><img src="{{ asset('Pic-rubrak/TW.png') }}" alt="TW" ></a>
                <a href="https://x.com/i/flow/login"><p>TW</p></a>
            </div>
            <div class="media">
                <a href="https://www.facebook.com/login/?locale=th_TH"><img src="{{ asset('Pic-rubrak/FB.png') }}" alt="FB" ></a>
                <a href="https://www.facebook.com/login/?locale=th_TH"><p>FB</p></a>
            </div>
            <div class="media">
                <a href="https://www.instagram.com/accounts/login/"><img src="{{ asset('Pic-rubrak/IG.png') }}" alt="IG" ></a>
                <a href="https://www.instagram.com/accounts/login/"><p>IG</p></a>
            </div>
            <div class="media">
                <a href="https://www.tiktok.com/login"><img src="{{ asset('Pic-rubrak/TT.png') }}" alt="TT" ></a>
                <a href="https://www.tiktok.com/login"><p>TT</p></a>
            </div>
            </div>
        </article>
</body>
</html>
