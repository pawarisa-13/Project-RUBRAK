<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/pet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/request.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Request</title>
</head>
<body>
    @if (session('success'))
        <div class="preem" id="preem-popup">
            <div class="preem-content">
                <span class="close-btn" onclick="closePreem()">&times;</span>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif
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

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="col-md-6">
    <div class="card p-4">

    <div class="text-center mb-4">
    <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="100" alt="Logo">
    <h3>Pet Adoption Edit Form</h3>

    <form action="{{ route('requests.update', ['id' => $rd->getKey()]) }}" method="POST">
         @csrf
        @method('PUT')
        <div class="form-group mb-3 flex-column">
                <label>Pet Experience</label>
                <input type="text" name="pet_experience" class="form-control" value="{{ old('pet_experience', $rd->pet_experience) }}">
            </div>

            <div class="form-group mb-3 flex-column">
                <label>Other Pets</label>
                <input type="text" name="other_pet" class="form-control" value="{{ old('other_pet', $rd->other_pet) }}" required>
            </div>

            <div class="form-group mb-3 flex-column">
                <label>Adopt Reason</label>
                <input type="text" name="adopt_reason" class="form-control" value="{{ old('adopt_reason', $rd->adopt_reason) }}" required>
            </div>

            <div class="form-group mb-3 flex-column">
                <label>Phone</label>
                <input type="tel" name="phone" class="form-control" value="{{ old('phone', $rd->phone) }}" required>
            </div>

            <div class="form-group mb-4 flex-column">
                <label>Address</label>
                <input type="text" name="address_user" class="form-control" value="{{ old('address_user', $rd->address_user) }}" required>
        </div>

        <div class="btn-edit">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
            <a href="{{ route('ur_req')}}" class="btn btn-outline-primary" style="width: 120px">Back</a>
            {{-- <button class="btn btn-outline-primary" action="{{ route('ur_req')}}"><a href="http:{{ route('ur_req')}}">Back</a></button> --}}
            
        </div>
       
        </div>
    </form>
    </div>
  </div>
</div>




</body>
</html>