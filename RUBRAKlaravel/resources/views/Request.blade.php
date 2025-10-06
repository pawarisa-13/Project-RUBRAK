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
    <title>Request</title>
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

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="col-md-6">
    <div class="card p-4">

        <div class="text-center mb-4">
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="100" alt="Logo">
            <h3 class="mt-3">Pet Adoption Form</h3>
            <p class="text-muted">Please fill in your details to apply for adopting {{ $pet->name_pet }}</p>
        </div>
      
        <form action="{{ route('request.form') }}" method="POST">
            @csrf
            <input type="hidden" name="pet_id" value="{{ $pet->pet_id }}">

            <div class="form-group">
                <label>Pet Experience</label>
                <textarea name="pet_experience" class="form-control" required placeholder="Please tell us about your pet experience"></textarea>
            </div>

            <div class="form-group mb-3 flex-column">
                <label>Other Pets</label>
                <textarea name="other_pet" class="form-control" required placeholder="How many pets you have, and what their type"></textarea>
            </div>

            <div class="form-group mb-3 flex-column">
                <label>Adopt Reason</label>
                <textarea name="adopt_reason" class="form-control" required placeholder="Why you want to adopt {{ $pet->name_pet }}"></textarea>
            </div>

            <div class="form-group mb-3 flex-column">
                <label>Phone</label>
                <input type="tel" name="phone" class="form-control" required placeholder="0123456789">
            </div>

            <div class="form-group mb-4 flex-column">
                <label>Address</label>
                <textarea name="address_user" class="form-control" required placeholder="Your address"></textarea>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>




</body>
</html>