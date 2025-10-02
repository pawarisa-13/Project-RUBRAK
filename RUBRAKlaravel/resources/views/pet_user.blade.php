<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
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

        <!-- All -->
        <div class="filter-item">
            <a href="{{ route('pet.filter') }}" 
            class="filter-btn {{ request('type') == null ? 'active' : '' }}"
            >
            <img src="{{ asset('storage/icon_filter/' . $icons['All']) }}" alt="All" class="btn-icon">
            </a>
            
            <span class="filter-label {{ request('type') == null ? 'active' : '' }}">All</span>
        </div>

        <!-- Types -->
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
            <img src="{{ asset($pet->picture) }}" alt="{{ $pet->name_pet }}">
            <h3>{{ $pet->name_pet }}</h3>
            <p>{{ $pet->gender }} | {{ $pet->province }}</p>
            <button onclick="openModal('{{ $pet->pet_id }}')">More Info</button>
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
