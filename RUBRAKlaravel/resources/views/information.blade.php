<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <title>Request Table</title>
</head>

<body>
    <header>

        <div class="logo">
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="36" alt="imglogo">
            <h4>Rubrak</h4>
        </div>
        <ul>
            <li class="menu"><a href="{{ route('home') }}">Home</a></li>
            <li class="menu"><a href="{{ route('pets.index') }}">Pet</a></li>
            <li class="menu"><a href="{{ route('donate') }}">Donate</a></li>
            <li class="menu"><a href="{{ route('contact') }}">Contact Us</a></li>
            <li class="menu"><a href="{{ route('profile') }}">Profile</a></li>

        </ul>
    </header>

    <div class="header-stripe"></div>

    <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="200" alt="imglogo">

    <h2>Table imformation here</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Pet ID</th>
                <th>Pet Picture</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Type</th>
                <th>Vaccine</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>

</body>

</html>
