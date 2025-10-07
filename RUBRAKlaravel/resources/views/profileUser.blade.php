<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">

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

    <div class="page-wrap">
    <!-- แถบ side bar -->
    <div class="profile-info">
      <button class="button-profile" type="button">Profile</button>

      {{-- <form method="POST" action="{{ route('yourrequest') }}">
        @csrf
      <button class="button-request" type="button">Your Request</button>
      </form> --}}
      {{-- <form method="POST" action="{{ route('ur_req') }}">
        @csrf
      <button class="button-request" type="submit">Your Request</button>
      </form> --}}
       <a  href="{{ route('ur_req') }}"><button class="button-request">Your Request</button></a>

     <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="button-logout">Logout</button>
    </form>
    </div>

    <!-- ข้อมูลผู้ใช้ -->
    <div class="content">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
          </ul>
        </div>
      @endif

      <div class="info-box">
        <h5>Profile Information</h5>
        <p><strong>Username: </strong> {{ Auth::user()->name ?? '-' }}</p>
        <!-- <p><strong>Phone: </strong> {{ Auth::user()->phone ?? '-' }}</p> -->
        <p><strong>Email: </strong> {{ Auth::user()->email ?? '-' }}</p>
      </div>
    <!-- ส่วน edit profile -->
      <div class="info-box">
        <h5>Edit Profile</h5>
        <form method="POST" action="{{ route('profile.update') }}">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="form-label">Username: </label>
            <input type="text" name="name" class="info"
              value="{{ old('name', Auth::user()->name ?? '') }}" required>
          </div>
          <!-- <div class="mb-3">
            <label class="form-label">Phone: </label>
            <input type="text" name="phone" class="info"
              value="{{ old('phone', Auth::user()->phone ?? '') }}">
          </div> -->
          <div class="mb-3">
            <label class="form-label">Email: </label>
            <input type="email" name="email" class="info"
              value="{{ old('email', Auth::user()->email ?? '') }}" required>
          </div>
          <div class="edit-button">
            <button type="submit" class="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>