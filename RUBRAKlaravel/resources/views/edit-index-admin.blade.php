<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pet</title>
    <link rel="stylesheet" href="{{ asset('css/pets.css') }}">
</head>
<body>
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
    <h1>Edit {{ $p->name_pet }}</h1>

    <form action="{{ route('admin.pets.update', $p->pet_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Name :</label>
        <input type="text" name="name_pet" value="{{ $p->name_pet }}" required><br><br>

        <label>Age :</label>
        <input type="number" name="age_pet" value="{{ $p->age_pet }}" required><br><br>

        <label>Gender :</label>
        <input type="radio" name="gender" value="Male" {{ $p->gender == 'Male' ? 'checked' : '' }}> Male
        <input type="radio" name="gender" value="Female" {{ $p->gender == 'Female' ? 'checked' : '' }}> Female
        <br><br>

        <label>Picture :</label>
        <input type="file" name="picture"><br>
        @if($p->picture)
            <img src="{{ asset('storage/'.$p->picture) }}" width="100">
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
        <input type="radio" name="vaccine" value="1" {{ $p->vaccine ? 'checked' : '' }}> Yes
        <input type="radio" name="vaccine" value="0" {{ !$p->vaccine ? 'checked' : '' }}> No
        <br><br>

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

        <button type="submit">Update Pet</button>
    </form>

    <br>
    <a href="{{ url('http://127.0.0.1:8000/admin/pets') }}">Back</a>
</body>
</html>
