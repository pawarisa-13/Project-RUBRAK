<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    <main>
        <div>
            <img src="{{ asset('Pic-rubrak/homepic.jpg') }}" alt="contactpic" width="635" height="741" style="float: right; margin-left: 10px;">
        </div>
        <div class="contact-context">
            <h1>Contact Page</h1><br>
            <p>Every dog deserves a second chance. They are waiting patiently for someone to open their heart and home.</p>
        </div>
        <div class="add-contact">
            <h2>Address</h2>
            <p>45 Maplewood Avenue Greenhill, NY 12845 United States</p>
            <p>18 Rosewood Lane Riverdale, London SW3 7TP United Kingdom</p>
        </div>
        <div class="gen-contect">
            <h2>General inquiries</h2>
            <p>info@sunnytechsolutions.com <br>Phone: +1 (408) 555-9274</p>
            <br>
            <p>emily.johnson@examplemail.com <br>Phone: +1 (212) 555-3489</p>
        </div>
        <div class="inter-contact">
            <h2></h2>
            <p>careers@oceanbreezeinc.com</p>
        </div>
        <div class="social">
            <h2>Follow us</h2>
            <div class="media">
                <img src="" alt="">
                <p>TW</p>
            </div>
            <div class="media">
                <img src="" alt="">
                <p>FB</p>
            </div>
            <div class="media">
                <img src="" alt="">
                <p>IG</p>
            </div>
            <div class="media">
                <img src="" alt="">
                <p>TT</p>
            </div>
        </div>
    </main>
</body>
</html>
