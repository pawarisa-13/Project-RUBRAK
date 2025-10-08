<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Rubrak</title>
    <style>
        h1{
            color: #364c84
        }
        .btn {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            border: none;
            border-radius: 25px;
            color: white;
            padding: 12px;
            /* font-weight: bold; */
            transition: 0.3s;
        }

        .menu-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 80px;
            margin-top: 40px;

        }

        .sidebar {
            background-color: #fdfcf4;
            border: 1.5px solid #364c84;
            border-radius: 10px;
            width: 180px;
            height: 150px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);

            
            display: flex;
            flex-direction: column;

            justify-content: center;
            align-items: center;
            text-align: center;
            transition: all 0.2s ease;

        }

        .sidebar .icon {
            font-size: 32px;
            color: #364c84;
            margin-bottom: 10px;
        }

        .sidebar a {
            display: flex;
            text-decoration: none;
            color: #364C84;
            font-weight: 500;
            padding: 5px 5px;
            margin: 5px;
            border-radius: 10px;
            text-align: center;
            /* transition: all 0.2s ease-in-out; */
            justify-content: center;
        }
        .sidebar p{
            color: #364c84;
        }

        .sidebar:hover {
            background-color: #364c84;
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }


        .sidebar:hover .icon {
            color: #fdfcf4;
        }

        .sidebar:hover p {
            color: #fdfcf4;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" alt="imglogo">
            <p>Rubrak</p>
        </div>
        <div class="nav">
            <ul>
                <li class="menu"><a href="{{ route('home') }}">Home</a></li>
                <li class="menu"><a href="{{ route('pet.filter') }}">Pet</a></li>
                <li class="menu"><a href="{{ route('donate') }}">Donate</a></li>
                <li class="menu"><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>
        <div class="btn">
            @auth
                {{-- ถ้าล็อกอินแล้ว --}}
                <a href="{{ route('profile') }}"><button class="btn-header">Hello!, {{ Auth::user()->name }}</button></a>
            @else
                {{-- ถ้ายังไม่ล็อกอิน --}}
                <a href="{{ route('login') }}"><button class="btn-header">Sign In</button></a>
                <a href="{{ route('register') }}"><button class="btn-header">Sign Up</button></a>
            @endauth
        </div>
    </header>

    <main>
        <div>
            <img src="" alt="">
        </div>
        <img src="" alt="">
        <div>
            <h1><center>Hello! {{ Auth::user()->name }}</center></h1>
            <br>
            <div>
            <br><br>
            <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:20px;" class="menu-cards">
                <a href="{{ route('admin.pets.index') }}" style="text-decoration:none; color:inherit;">
                <div class="sidebar" style="text-decoration: none;">
                    <i class="fa-solid fa-dog icon"></i>
                    <p>Add pet</p>
                </div>
                </a>

                <a href="{{ route('infoTable') }}" style="text-decoration:none; color:inherit;">
                <div class="sidebar">
                    <i class="fa-solid fa-table icon"></i>
                    <p>Information</p>
                </div>
                </a>

                <a href="{{ route('reqTable') }}" style="text-decoration:none; color:inherit;">
                <div class="sidebar">
                    <i class="fa-solid fa-envelope-open-text icon"></i>
                    <p>Request</p>
                </div>
                </a>

            </div>
            <br><br>
            <div class="btn">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                </form>
            </div>


        </div>
    </main>
</body>

</html>
