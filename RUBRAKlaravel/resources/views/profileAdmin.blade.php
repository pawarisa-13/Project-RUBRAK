<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <title>Rubrak</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}"  width="36" alt="imglogo">
            <h4>Rubrak</h4>
        </div>
        <ul>
            <li class="menu"><a href="{{route ('home')}}">Home</a></li>
            <li class="menu"><a href="{{route ('pets.index')}}">Pet</a></li>
            <li class="menu"><a href="http://">Donate</a></li>
            <li class="menu"><a href="http://">Contact Us</a></li>
            <li class="menu"><a href="{{route ('profile')}}">Profile</a></li>
        </ul>
    </header>
    <div class="header-stripe"></div>

    <main>
        <div>
            <img src="" alt="">
        </div>
        <img src="" alt="">
        <div>
            <h1>Profile Admin</h1>
            <br><br>
            <a href="{{route ('pets.store')}}">Add pet</a><br><br>
            <a href="{{route ('infoTable')}}">Information</a><br><br>
            <a href="{{route ('reqTable')}}">Request</a><br><br>
            <br><br>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
            </form>


        </div>
    </main>
</body>
</html>
