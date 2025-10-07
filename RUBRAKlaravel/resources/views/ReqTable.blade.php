<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Request Table</title>
    <link rel="stylesheet" href="{{ asset('css/pet.css') }}">
    <script src="{{ asset('js/alert.js') }}"></script>
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

    <table>

    </table>

    <div class="header-stripe"></div>


    <div class="container mb-4">

    <div class="d-flex justify-content-center">
        <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="200" alt="imglogo">
    </div>
    <br><br>
    <h2>Table request here</h2><br>

<div class="container mb-4">

    <table class="table table-bordered table-hover align-middle text-center table-striped" >
        <thead class="table-primary">
        <tr>
            <th>Form ID</th>
            <th>Name Pet</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Pet Experience</th>
            <th>Other pets</th>
            <th>Adoption Reason</th>
            <th>Address</th>
            <th>Submit Date</th>
            <th>Status</th>
        </tr>

        </thead>



        @foreach ($requests as $item)
            <tr>
                <td>{{$item->number_req}}</td>
                <td>{{$item->pet->name_pet}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->user->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->pet_experience}}</td>
                <td>{{$item->other_pet}}</td>
                <td>{{$item->adopt_reason}}</td>
                <td>{{$item->address_user}}</td>
                <td>{{$item->created_at}}</td>
                {{-- <td>{{$item->status_request}}</td> --}}
                <td>
                    <form action="{{ route('request.approve', ['id' => $item->number_req]) }}" method="POST"
                        onsubmit="return confirm('Are you sure to approve ?')" style="margin:0;">
                        @csrf
                        <button class="btn btn-sm btn-outline-success"  type="submit">Approve</button>
                    </form>
                    <br>
                <form action="{{ route('request.reject', ['id' => $item->number_req]) }}" method="POST"
                    onsubmit="return confirm('Are you sure to reject ?')" style="margin:0;">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger"  type="submit">Reject</button>
                    </form>
                </td>

                {{-- <td><a href="{{route ('projects.form',$item->id)}}">Edit  </a>
                <a href="{{route ('projects.destroy',$item->id)}}">Deleted</a>
                </td> --}}


            </tr>
        @endforeach
        </td>
    </table>
    <br><a href="{{ url('http://127.0.0.1:8000/profile') }}"class="btn btn-sm btn-primary">Back</a>
</div>


</body>
</html>