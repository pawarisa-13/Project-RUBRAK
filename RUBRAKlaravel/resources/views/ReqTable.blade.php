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
    <style>
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

    <table>

    </table>


    <div class="container mb-4">

    <div class="d-flex justify-content-center">
        <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="200" alt="imglogo">
    </div>
    <br><br>


<div class="container mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pet Request</h2>
    <div class="filter">
    <form method="GET" action="{{ route('reqTable') }}" >
    <select class="form-select w-auto d-inline" name="status" onchange="this.form.submit()" >
        <option value="all"      {{ $filter==='all' ? 'selected' : '' }}>All</option>
        <option value="waiting"  {{ $filter==='waiting' ? 'selected' : '' }}>Waiting</option>
        <option value="approved" {{ $filter==='approved' ? 'selected' : '' }}>Approved</option>
        <option value="rejected" {{ $filter==='rejected' ? 'selected' : '' }}>Rejected</option>
    </select>
    </div>
</div>
</form>

    <table class="table table-bordered table-hover align-middle text-center table-striped" >
        <thead class="table-primary">
        <tr>

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
            <th>Process</th>
        </tr>

        </thead>

        <tbody>
             @if($requests->isEmpty())
            <tr>
                 <td colspan="12">
                    No request
                </td>
            </tr>
        @else

        @foreach ($requests as $item)
            <tr>

                <td>{{$item->pet->name_pet}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->user->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->pet_experience}}</td>
                <td>{{$item->other_pet}}</td>
                <td>{{$item->adopt_reason}}</td>
                <td>{{$item->address_user}}</td>
                <td>{{$item->created_at->format('j M Y H:i')}}</td>
                <td>{{$item->status_request}}</td>
                
                <td>
                @php
                    $pc = ($item->status_request === 'waiting') ;
                @endphp

                @if($pc)

                    <form action="{{ route('request.approve', ['id' => $item->number_req]) }}" method="POST"
                        onsubmit="return confirm('Are you sure to approve ?')" style="margin:0;">
                        @csrf
                        <button class="btn btn-sm btn-outline-success"  type="submit" style="width: 75px">Approve</button>
                    </form>
                    <br>
                <form action="{{ route('request.reject', ['id' => $item->number_req]) }}" method="POST"
                    onsubmit="return confirm('Are you sure to reject ?')" style="margin:0;">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger"  type="submit" style="width: 75px">Reject</button>
                    </form>
                </td>
                @else
                {{$item->deleted_at->format('j M Y H:i')}}
                @endif
            </tr>
         @endforeach
         @endif
         </tbody>
    </table>
    <br><a href="{{ url('http://127.0.0.1:8000/profile') }}"class="btn btn-sm btn-primary">Back</a>
</div>


</body>
</html>
