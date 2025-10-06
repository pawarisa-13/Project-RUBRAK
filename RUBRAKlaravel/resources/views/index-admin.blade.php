<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Post</title>
    <style>
        .btn-primary {
            background-color: #364C84;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #2c3c6a;
        }

        .form-control,
        .form-select {
            border-radius: 25px;
            background-color: #f1f1f1;
            border: none;
            padding: 12px 18px;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 5px #98A9D2;
            background-color: #fff;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-select {
            appearance: none;
            
            -webkit-appearance: none;
            -moz-appearance: none;
            border-radius: 25px;
            background-color: #364C84;
            color: white;
            padding: 10px 40px 10px 15px;
            border: none;
            font-size: 16px;
            font-weight: 500;
            background-image: url("data:image/svg+xml;utf8,<svg fill='white' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 18px;
        }

        .form-control {
            border-radius: 25px;
            background-color: #f1f1f1;
            border: none;
            /* padding: 12px 18px; */
        }

        .form-group {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
  }
  .form-group label {
      /* กำหนดความกว้าง label */
    font-weight: 500;
    margin-right: 10px;
  }
  .form-group input,
  .form-group select,
  .form-group textarea {
    flex: 1;
    border-radius: 10px;
    background: #f1f1f1;
    border: none;
    padding: 10px 15px;
  }
  .form-group textarea {
    resize: none;
    height: 80px;
  }
  .form-check-inline {
    margin-right: 15px;
  }
  .btn-submit {
    background: #364C84;
    border: none;
    border-radius: 25px;
    color: white;
    padding: 12px;
    font-weight: bold;
    width: 100%;
    transition: 0.3s;
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
    <div class="header-stripe"></div>

    {{-- <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" alt="Logo" width="100"> --}}
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="col-md-6">
            <div class="row justify-content-center">

                {{-- <div class="text-center mt-4"> --}}
                <div class="card p-4">
                    <div class="text-center mb-4">
                        <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" width="100" alt="Logo">
                    </div>
                    {{-- </div> --}}

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

    <h2>Your Posted !</h2>

    <!-- Card -->
    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:20px;">
        @foreach ($pets as $p)
            <div class="Card-box"
                style="flex:0 0 250px; max-width:250px; border:1px solid #364c84; border-radius:15px; padding:15px; background:#fdf8e2; box-shadow:0 2px 6px rgba(0,0,0,0.1); box-sizing:border-box; color:#364c84;">
                <img src="{{ asset('storage/' . $p->picture) }}" alt="{{ $p->name_pet }}"
                    style="width:200px; height:200px; border-radius:6px; object-fit:cover; ">

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
    </div><br><br>
    <div class="text-center mt-4">
        <a href="http://127.0.0.1:8000/profile" class="btn btn-sm btn-primary">Back</a>
    </div>

</body>

</html>
