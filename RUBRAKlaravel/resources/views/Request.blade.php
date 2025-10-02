<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/pet.css') }}">
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
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}"  width="36" alt="imglogo">
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
    <form action="{{ route('request.form') }}" method="POST">
        @csrf
        <h2>Pet Adoption Form</h2> <br>
        <input type="hidden" name="pet_id" value="{{ $pet->pet_id }}">

        <label>Pet Experience </label><br>
        <textarea name="pet_experience" required placeholder="please tell us about your pet experience"></textarea>
        <br><br>

        <label>Other Pets </label><br>
        <textarea  name="other_pet" required placeholder="How many pets you have,and what their type"></textarea>
        {{-- <input type="text" name="other_pet" required> --}}
        <br><br>

        <label>Adopt Reason</label><br>
        <textarea name="adopt_reason" required placeholder="Why you want to adopt {{$pet->name_pet}}"></textarea>
        <br><br>

        <label>Phone</label><br>
        <input type="tel" name="phone" required placeholder="0112233444"></input>
        <br><br>

        <label>Address</label><br>
        <textarea name="address_user" required placeholder="your address"></textarea>
        <br><br>

        <button class="preem" type="submit">Submit</button>
  </form>



</body>
</html>
