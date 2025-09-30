<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <title>Request Table</title>
</head>
<body>
    <header>

            <div class="logo">
            <img src="{{ asset('Logo-rubrak/LogoRubRak.png.PNG') }}"  width="36" alt="imglogo">
            <h4>Rubrak</h4>
        </div>
        <ul>
            <li class="menu"><a href="{{route ('home')}}">Home</a></li>
            <li class="menu"><a href="{{route ('pets.index')}}">Pet</a></li>
            <li class="menu"><a href="{{route ('donate')}}">Donate</a></li>
            <li class="menu"><a href="{{route ('contact')}}">Contact Us</a></li>
            <li class="menu"><a href="{{route ('profile')}}">Profile</a></li>

        </ul>
    </header>

    <div class="header-stripe"></div>

    <h2>Table request here</h2>


</body>
</html>
