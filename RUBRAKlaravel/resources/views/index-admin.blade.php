<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
    <img src="{{ asset('Logo-rubrak/LogoRubRak.png.PNG') }}" alt="Logo" width="100">
    <form action=" " method="POST" enctype="multipart/form-data">
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

</body>
</html>