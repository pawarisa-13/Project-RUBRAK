<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/indexadmin.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Post</title>
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
            <li class="menu"><a href="{{route ('post_pet')}}">Pet</a></li>
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
    <a href="http://127.0.0.1:8000/profile" class="btn-back"><button class="back">Back</button></a>



    <div class="container " style="min-height: 100vh;">


        <div class="col-md-6">
            <div class="row justify-content-center">


                <div class="card p-4">
                    <div class="text-center mb-4">
                        <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="100" alt="Logo">
                    </div>
                    

                    </form>
                    <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" id="name" name="name_pet" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <label for="age">Age :</label>
                            <input type="number" id="age" name="age_pet" placeholder="Age" required>
                        </div>

                        <div class="form-check-inline">
                            <label>Gender :</label>
                            <input type="radio" name="gender" value="Male" required> Male
                            <input type="radio" name="gender" value="Female" required> Female
                            <br><br>
                        </div>

                        <div class=>
                            <label>Picture :</label>
                            <input type="file" name="picture" required><br><br>
                        </div>

                        <div class="">
                            <label>Type :</label>
                            <select name="type" class="custom-select" required>
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Fish">Fish</option>
                                <option value="Rabbit">Rabbit</option>
                                <option value="etc.">Etc.</option>
                            </select><br><br>
                        </div>

                        <div class="form-check-inline">
                            <label>Vaccine :</label>
                            <input type="radio" name="vaccine" value="1" required> Yes
                            <input type="radio" name="vaccine" value="0" required> No
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label>Breed :</label>
                            <input type="text" name="breed" placeholder="Breed" required><br><br>
                        </div>

                        <div class="form-group">
                            <label>Province :</label>
                            <input type="text" name="province" placeholder="Location" required><br><br>
                        </div>

                        <div class="form-group">
                            <label>Foundation :</label>
                            <input type="text" name="foundation" placeholder="Foundation" required><br><br>
                        </div>

                        <div class="form-group">
                            <label>Info :</label>
                            <textarea name="info" placeholder="Additional Information" required></textarea><br><br>
                        </div>

                        <div class="form-check-inline">
                            <label>Status :</label>
                            <input type="radio" name="status" value="1" required> Available
                            <input type="radio" name="status" value="0" required> Adopted
                            <br><br>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Pet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h2 style=""><center>Your Posted!</center></h2>

    <!-- Card -->
    <div  style="display:flex; flex-wrap:wrap; gap:20px; margin:20px;">
        @foreach ($pets as $p)
            <div class="Card-box"
                style="flex:0 0 250px; max-width:250px; border:1px solid #364c84; border-radius:15px; padding:15px; background:#fdf8e2; box-shadow:0 2px 6px rgba(0,0,0,0.1); box-sizing:border-box; color:#364c84;">
                <img src="{{ asset('storage/' . $p->picture) }}" alt="{{ $p->name_pet }}"
                    style="width:200px; height:200px; border-radius:6px; object-fit:cover; display:block; margin:auto; ">

                <div class="post">
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
                </div>

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
    </div><br><br>


</body>

</html>
