<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/yourreq.css')}}">
    

    <title>Rubrak</title>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
     @if (session('success'))
        <div class="preem" id="preem-popup">
            <div class="preem-content">
                <span class="close-btn" onclick="closePreem()">&times;</span>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @elseif (session('error'))
        <div class="preem" id="preem-popup">
            <div class="preem-content">
                <span class="close-btn" onclick="closePreem()">&times;</span>
                <p>{{ session('error') }}</p>
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

     <div class="page-wrap">
    <!-- แถบ side bar -->
    <div class="sidebar">
        <a href="{{route('profile')}}"><button class="button-profile" type="button">Profile</button></a>
        <a  href="{{ route('ur_req') }}"><button class="button-request">Your Request</button></a>

         <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="button-logout">Logout</button>
        </form>
    </div>
    <div class="info-box">
        <h3>Your Request</h3>
        <div class="pet-container">
        @foreach($requests as $req)
        <div class="pet-card">
            <img src="{{ asset('storage/' . $req->pet->picture) }}" alt="No Image">
            <div>
                <h4>{{ $req->pet->name_pet ?? 'Unknown' }}</h4>
                <p>type: {{ $req->pet->type ?? '-' }}</p>
            </div>
            <div>
                <p>Status:
            @if ($req->status_request === 'waiting')
                <span class="text-warning fw-bold">Waiting</span>
            @elseif($req->status_request === 'approved')
                <span class="text-success fw-bold">Approved</span>
            @elseif($req->status_request === 'rejected')
                <span class="text-danger fw-bold">Rejected</span>
            @else
                <span class="text-secondary">-</span>
            @endif</p>
            </div>
            <div>
                <p>Requested On</p>
            {{ $req->created_at->format('d M Y') }}
            </div>
            @php
                $pc = ($req->status_request === 'waiting') ;
                @endphp

                @if ($pc)
                    <div class="reqEdit">
                        <a href="{{route('requests.edit',['id' => $req->number_req])}}"class="btn btn-outline-primary" style="width: 75px">Edit</a>

                    <form action="{{route('req.destroy',['id' => $req->number_req])}}" method="POST"
                        onsubmit="return confirm('Are you sure to cancel ?')" style="margin:0;">
                        @csrf
                        @method('DELETE')
                    <button class="btn  btn-outline-danger"  type="submit" >Cancel</button>
                    </form>
                    </div>
                @else
                <button class="btn btn-light" disabled>Can not edit</button>
                @endif
        </div>

        @endforeach
    </div>
    </div>

</body>
</html>
