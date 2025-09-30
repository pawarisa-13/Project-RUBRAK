<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <title>Post</title>
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
            <li class="menu"><a href="http://">Donate</a></li>
            <li class="menu"><a href="http://">Contact Us</a></li>
            <li class="menu"><a href="{{route ('profile')}}">Profile</a></li>

        </ul>
    </header>
    <div class="header-stripe"></div>
    <img src="{{ asset('Logo-rubrak/LogoRubRak.png.PNG') }}" alt="Logo" width="100">
    <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name :</label>
        <input type="text" name="name_pet" placeholder="Name" required><br><br>

        <label>Age :</label>
        <input type="number" name="age_pet" placeholder="Age in months" required><br><br>

        <label>Gender :</label>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
        <br><br>

        <label>Picture :</label>
        <input type="file" name="picture"><br><br>

        <label>Type :</label>
        <select name="type">
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Fish">Fish</option>
            <option value="Rabbit">Rabbit</option>
            <option value="etc.">Etc.</option>
        </select><br><br>

        <label>Vaccine :</label>
        <input type="radio" name="vaccine" value="1"> Yes
        <input type="radio" name="vaccine" value="0"> No
        <br><br>

        <label>Breed :</label>
        <input type="text" name="breed" placeholder="Breed"><br><br>

        <label>Province :</label>
        <input type="text" name="province" placeholder="Location"><br><br>

        <label>Foundation :</label>
        <input type="text" name="foundation" placeholder="Foundation"><br><br>

        <label>Info :</label>
        <textarea name="info" placeholder="Additional Information"></textarea><br><br>

        <label>Status :</label>
        <input type="radio" name="status" value="1"> Available
        <input type="radio" name="status" value="0"> Adopted
        <br><br>

        <button type="submit">Add Pet</button>
    </form>

    <hr>

    <h2>Your Posted !</h2>

    <!-- Card -->
    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:20px;">
        @foreach ($pets as $p)
            <div class="Card-box"
                style="flex:0 0 250px; max-width:250px; border:1px solid #364c84; border-radius:10px; padding:15px; background:#fdf8e2; box-shadow:0 2px 6px rgba(0,0,0,0.1); box-sizing:border-box; color:#364c84;">
                <img src="{{ asset('storage/' . $p->picture) }}" alt="{{ $p->name_pet }}"
                    style="width:100%; height:auto; border-radius:6px; object-fit:cover;">

                <h3>{{ $p->name_pet }}</h3>
                <p>Age : {{ $p->age_pet }} months</p>
                <p>Gender: {{ $p->gender }}</p>
                <p>Type : {{ $p->type }}</p>
                <p>Vaccine: {{ $p->vaccine ? 'Yes' : 'No' }}</p>
                <p>Breed : {{ $p->breed }}</p>
                <p>Province : {{ $p->province }}</p>
                <p>Foundation : {{ $p->foundation }}</p>
                <p>Info : {{ $p->info }}</p>
                <p>Status : {{ $p->status ? 'Available' : 'Adopted' }}</p>

                <div style="display:flex; gap:8px; margin-top:10px;">
                    <a href="{{ route('pets.edit', $p->pet_id) }}"
                        style="padding:6px 10px; border:1px solid #1e40af; border-radius:6px; background:#1e40af; text-decoration:none; color:#ffffff">Edit</a>

                    <form action="{{ route('pets.destroy', $p->pet_id) }}" method="POST"
                        onsubmit="return confirm('Are you sure?')" style="margin:0;">
                        @csrf
                        @method('DELETE')
                        <button
                            style="padding:6px 10px; border:1px solid #cb3434; border-radius:6px; background:#cb3434; color:#ffffff">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
