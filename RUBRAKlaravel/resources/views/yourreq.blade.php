<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <title>Rubrak</title>
    <style>
        h1{
            color: #364C84;
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
    <h1><center>Your Request</center></h1><br>

    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>Pet Name</th>
                <th>Pet Picture</th>
                <th>Type</th>
                <th>Status</th>
                <th>Requested On</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $req)
                <tr>
                    <td>{{ $req->pet->name_pet ?? 'Unknown' }}</td>
                    <td>
                        @if ($req->pet && $req->pet->picture)
                            <img src="{{ asset('storage/' . $req->pet->picture) }}" width="70" height="70"
                                style="object-fit: cover; border-radius:8px;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $req->pet->type ?? '-' }}</td>
                    <td>
                        @if ($req->status_request === 'waiting')
                            <span class="text-warning fw-bold">Waiting</span>
                        @elseif($req->status_request === 'approved')
                            <span class="text-success fw-bold">Approved</span>
                        @elseif($req->status_request === 'rejected')
                            <span class="text-danger fw-bold">Rejected</span>
                        @else
                            <span class="text-secondary">-</span>
                        @endif
                    </td>
                    <td>{{ $req->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        You haven’t requested to adopt any pets yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>


    
</body>
</html>