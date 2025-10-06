<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Pet</title>
    <link rel="stylesheet" href="{{ asset('css/pets.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .edit-container{
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px 0;
            background-color: #faf9f6;
        }

        .form-card {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 40px 50px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: left;
        }

        .form-logo {
            display: block;
            margin: 0 auto 20px;
            width: 90px;
        }

        .form-title {
            text-align: center;
            color: #364c84;
            margin-bottom: 20px;
        }

        label {
            font-weight: 250;
            color: #2f2f2f;
            display: block;
            margin-top: 12px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background-color: #f5f5f5;
            margin-top: 5px;
            outline: none;
        }
        .btn-container{
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px 0;
            background-color: #faf9f6;
        }
        .btn-back{
            color: #faf9f6;
            background-color: #364C84;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;

        }
        .btn-back a {
             color: #faf9f6;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" alt="imglogo">
            <p>Rubrak</p>
        </div>
        <div class="nav">
            <ul>
                <li class="menu"><a href="{{ route('home') }}">Home</a></li>
                <li class="menu"><a href="{{ route('pet.filter') }}">Pet</a></li>
                <li class="menu"><a href="{{ route('donate') }}">Donate</a></li>
                <li class="menu"><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>
        <div class="btn">
            @auth
                {{-- ถ้าล็อกอินแล้ว --}}
                <a href="{{ route('profile') }}"><button class="btn-header">Hello!, {{ Auth::user()->name }}</button></a>
            @else
                {{-- ถ้ายังไม่ล็อกอิน --}}
                <a href="{{ route('login') }}"><button class="btn-header">Sign In</button></a>
                <a href="{{ route('register') }}"><button class="btn-header">Sign Up</button></a>
            @endauth
        </div>
    </header>
    <div class="header-stripe"></div>

    <div class="edit-container">
        <div class="form-card">
            <form action="{{ route('admin.pets.update', $p->pet_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1 class="form-title">Edit {{ $p->name_pet }}</h1>
                <label>Name :</label>
                <input type="text" name="name_pet" value="{{ $p->name_pet }}" required><br><br>

                <label>Age :</label>
                <input type="number" name="age_pet" value="{{ $p->age_pet }}" required><br><br>

                <label>Gender :</label>
                <input type="radio" name="gender" value="Male" {{ $p->gender == 'Male' ? 'checked' : '' }}> Male
                <input type="radio" name="gender" value="Female" {{ $p->gender == 'Female' ? 'checked' : '' }}>
                Female
                <br><br>

                <label>Picture :</label>
                <input type="file" name="picture"><br>
                @if ($p->picture)
                    <img src="{{ asset('storage/' . $p->picture) }}" width="100">
                @endif
                <br><br>

                <label>Type :</label>
                <select name="type">
                    <option value="Dog" {{ $p->type == 'Dog' ? 'selected' : '' }}>Dog</option>
                    <option value="Cat" {{ $p->type == 'Cat' ? 'selected' : '' }}>Cat</option>
                    <option value="Fish" {{ $p->type == 'Fish' ? 'selected' : '' }}>Fish</option>
                    <option value="Rabbit" {{ $p->type == 'Rabbit' ? 'selected' : '' }}>Rabbit</option>
                    <option value="etc." {{ $p->type == 'etc.' ? 'selected' : '' }}>Etc.</option>
                </select><br><br>

                
                
                <label>Vaccine :</label>
            <div class="radio-group">
                <input type="radio" name="vaccine" value="1" {{ $p->vaccine ? 'checked' : '' }}> Yes
                <input type="radio" name="vaccine" value="0" {{ !$p->vaccine ? 'checked' : '' }}> No
                <br><br>
            </div>

                <label>Breed :</label>
                <input type="text" name="breed" value="{{ $p->breed }}"><br><br>

                <label>Province :</label>
                <input type="text" name="province" value="{{ $p->province }}"><br><br>

                <label>Foundation :</label>
                <input type="text" name="foundation" value="{{ $p->foundation }}"><br><br>

                <label>Info :</label>
                <textarea name="info">{{ $p->info }}</textarea><br><br>

                <label>Status :</label>
                <input type="radio" name="status" value="1" {{ $p->status ? 'checked' : '' }}> Available
                <input type="radio" name="status" value="0" {{ !$p->status ? 'checked' : '' }}> Adopted
                <br><br>

                <button type="submit" class="btn btn-sm btn-primary">Update Pet</button>
            </form>
        </div>
    </div>
    <div class="btn-container">
       <div class="btn-back">
        <a href="{{ url('http://127.0.0.1:8000/admin/pets') }}" style="text-decoration: none;" >Back</a>
    </div> 
    </div>
    
    
    
    
</body>

</html>
