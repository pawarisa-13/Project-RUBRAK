<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pet Page</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/pet.css') }}">
    {{-- js --}}
    <script>
        window.petsData = @json($pets);
    </script>
    <script src="{{ asset('js/pet-modal.js') }}"></script>
</head>
<body>
     {{-- Import Navbar --}}
    @include('layouts.navbar')
    <h1>Pet List</h1>

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
        <button class="adopt-btn">Send a request</button>
    </div>
</div>

</body>
</html>