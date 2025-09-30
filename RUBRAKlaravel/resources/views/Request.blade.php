<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <title>Request</title>
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
    <form method="POST" action="">
    @csrf

    <label>Pet Experience :</label><br>
    <input type="text" name="pet_experience" required><br><br>

    <label>Other Pets :</label><br>
    <input type="text" name="other_pets" required><br><br>

    <label>Adoption Reason :</label><br>
    <input type="text" name="adoption_reason" required><br><br>

    <label>Address :</label><br>
    <input type="text" name="address" required><br><br>


    <input type="checkbox" name="housing_type[]" value="Condo"> Condo
    <input type="checkbox" name="housing_type[]" value="House"> House
    <input type="checkbox" name="housing_type[]" value="Etc"> Etc<br>

    <!-- hidden field เอาข้อมูล user จาก auth -->
    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <br>
    <button type="submit">Submit</button>
</form>


</body>
</html>
