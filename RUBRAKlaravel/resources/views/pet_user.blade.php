<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <title>Pets Page</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/pet.css') }}">
    {{-- js --}}
    <script>
        window.petsData = @json($pets);
    </script>
    <script src="{{ asset('js/pet-modal.js') }}"></script>
</head>
<body>
    <header>

            <div class="logo">
            <img src="{{ asset('Logo-rubrak/LogoRubRak.png.PNG') }}"  width="36" alt="imglogo">
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

    <h1>Pet List</h1>
    <div class="filter-buttons">
        <a href="{{ route('pet.filter') }}">All</a>
        <a href="{{ route('pet.filter', ['type' => 'Dog']) }}">Dog</a>
        <a href="{{ route('pet.filter', ['type' => 'Cat']) }}">Cat</a>
        <a href="{{ route('pet.filter', ['type' => 'Rabbit']) }}">Rabbit</a>
        <a href="{{ route('pet.filter', ['type' => 'Fish']) }}">Fish</a>
    </div>

    <div class="pet-container">
        @foreach($pets as $pet)
        <div class="pet-card">
            <img src="{{ asset($pet->picture) }}" alt="{{ $pet->name_pet }}">
            <h3>{{ $pet->name_pet }}</h3>
            <p>{{ $pet->gender }} | {{ $pet->province }}</p>
            <button onclick="openModal({{ $pet->pet_id }})">More Info</button>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="">
            <h2 id="modalName"></h2>
            <p><strong>Age:</strong> <span id="modalAge"></span></p>
            <p><strong>Gender:</strong> <span id="modalGender"></span></p>
            <p><strong>Breed:</strong> <span id="modalBreed"></span></p>
            <p><strong>Vaccine:</strong> <span id="modalVaccine"></span></p>
            <p><strong>Info:</strong> <span id="modalInfo"></span></p>
            <p><strong>Foundation:</strong> <span id="modalFoundation"></span></p>
            <p><strong>Province:</strong> <span id="modalProvince"></span></p>
            <button class="adopt-btn"><a style="text-decoration: none ; color:aliceblue;"  href="{{route('request.form')}}">Send a request</a></button>
        </div>
    </div>

</body>
</html>
