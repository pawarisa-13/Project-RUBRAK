<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Information Table</title>
    <style>
        .filter{
            color: #364C84;
        }
        .btn-primary{
            background: #364C84;
            border: none;
            border-radius: 25px;
            color: white;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-primary:hover{
            background: #364C84;
            color: white;
        }
    </style>
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

    
    <div class="header-stripe"></div>

    <div class="container mb-4">

        <div class="d-flex justify-content-center">
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="200" alt="imglogo">
        </div>

<div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pet Information</h2>

        {{-- Filter dropdown --}}
    <div class="filter">
        <form method="GET" action="{{ route('pets.information') }}">
            <select name="filter-inform" class="form-select w-auto d-inline" onchange="this.form.submit()">
                <option value="all" {{ request('filter-inform') == 'all' ? 'selected' : '' }}>ALL</option>
                <option value="available" {{ request('filter-inform') == 'available' ? 'selected' : '' }}>Available
                </option>
                <option value="adopted" {{ request('filter-inform') == 'adopted' ? 'selected' : '' }}>Adopted</option>
            </select>
        </div>

</div>
            <table class="table table-bordered table-hover align-middle text-center table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Pet ID</th>
                        <th>Pet Picture</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Breed</th>
                        <th>Type</th>
                        <th>Vaccine</th>
                        <th>Status</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($p->picture)
                                    <img src="{{ asset('storage/' . $p->picture) }}" width="70" height="70"
                                        style="object-fit: cover; border-radius:8px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $p->name_pet }}</td>
                            <td>{{ $p->age_pet }}</td>
                            <td>{{ $p->gender }}</td>
                            <td>{{ $p->breed }}</td>
                            <td>{{ $p->type }}</td>
                            <td>{{ $p->vaccine ? 'Yes' : 'No' }}</td>
                            <td>{{ $p->status ? 'Available' : 'Adopted' }}</td>
                            <td>{{ $p->foundation }} , {{ $p->province }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ url('http://127.0.0.1:8000/profile') }}"class="btn btn-sm btn-primary">Back</a>
    </div>
</body>

</html>
