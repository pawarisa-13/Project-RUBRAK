
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Information Table</title>
</head>

<body>
    <header>
    
        <div class="logo">
            <div> 
                <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="36" alt="imglogo">
            </div>
           
            <h4>Rubrak</h4>
        </div>
    
        <ul>
            <li class="menu"><a href="{{ route('home') }}">Home</a></li>
            <li class="menu"><a href="{{ route('pets.index') }}">Pet</a></li>
            <li class="menu"><a href="{{ route('donate') }}">Donate</a></li>
            <li class="menu"><a href="{{ route('contact') }}">Contact Us</a></li>
            <li class="menu"><a href="{{ route('profile') }}">Profile</a></li>

        </ul>
        
    </header>
    <div class="header-stripe"></div>

<div class="container mb-4">
    
    <div class="d-flex justify-content-center">
        <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="200" alt="imglogo">
    </div>
        
    
    <h2>Pet Information</h2>
    <table  class="table table-bordered table-hover align-middle text-center table-striped">
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
                        <img src="{{ asset('storage/' . $p->picture) }}" width="70" height="70" style="object-fit: cover; border-radius:8px;">
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