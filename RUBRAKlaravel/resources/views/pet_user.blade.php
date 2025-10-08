<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/pet.css') }}">
    <script>
        window.petsData = @json($pets);
        window.adoptUrlTemplate = "{{ route('req.view', ':pet_id') }}";
    </script>
    <script src="{{ asset('js/pet-modal.js') }}"></script>
    <title>Pets Page</title>
</head>

<body>
    @if (session('success'))
        <div class="preem" id="preem-popup">
            <div class="preem-content">
                <span class="close-btn" onclick="closePreem()">&times;</span>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @elseif (session('error'))
        <div class="preem" id="preem-popup">
            <div class="preem-content">
                <span class="close-btn" onclick="closePreem()">&times;</span>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif

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

    <div class="filter-buttons">
        @php
            $types = ['Dog', 'Cat', 'Rabbit', 'Fish'];
            $icons = [
            'All' => 'all.png',
            'Dog' => 'dog.png',
            'Cat' => 'cat.png',
            'Rabbit' => 'rabbit.png',
            'Fish' => 'fish.png'
        ];
        @endphp

        
        <div class="filter-item">
            <a href="{{ route('pet.filter') }}"
            class="filter-btn {{ request('type') == null ? 'active' : '' }}"
            >
            <img src="{{ asset('storage/icon_filter/' . $icons['All']) }}" alt="All" class="btn-icon">
            </a>

            <span class="filter-label {{ request('type') == null ? 'active' : '' }}">All</span>
        </div>


        @foreach ($types as $type)
        <div class="filter-item">
            <a href="{{ route('pet.filter', ['type' => $type]) }}"
            class="filter-btn {{ request('type') == $type ? 'active' : '' }}">
            <img src="{{ asset('storage/icon_filter/' . $icons[$type]) }}" alt="{{ $type }}" class="btn-icon">
            </a>
            <span class="filter-label {{ request('type') == $type ? 'active' : '' }}">{{ $type }}</span>
        </div>
        @endforeach
    </div>

    </div>

    <div class="pet-container">
        @foreach($pets as $pet)
        <div class="pet-card">
            <img src="{{ asset('storage/' . $pet->picture) }}" alt="{{ $pet->name_pet }}">
            <h3>{{ $pet->name_pet }}</h3>
            <p>{{ $pet->gender }} | {{ $pet->province }}</p>
            <button onclick="openModal('{{ $pet->pet_id }}')">More Info</button>
            <button class="adopt-btn"><a style="text-decoration: none ; color:aliceblue;"  href="{{ route('req.view', ['pet_id' => $pet->pet_id]) }}">Send a request</a></button>
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

        </div>
    </div>

</body>
</html>
