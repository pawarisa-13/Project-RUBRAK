<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/donate.css')}}">
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" alt="Rub Rak" width="36" class="me-2">
        Rub Rak
      </a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto">
            <!-- อย่าลืมลิ้งไปหน้าอื่น!!!!!!! -->
        <li class="nav-item"><a class="nav-link" href="/Rubrakhome">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/pet ">Pet</a></li>
        <li class="nav-item"><a class="nav-link active" href="/donate">Donate</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact us">Contact Us</a></li>
        </ul>
      </div>

      <a class="btn-user" href="{{ url('/profile') }}">
        <img src="{{ asset('photo/IMG_5426.jpg') }}" alt="user">
        Hello!, {{ auth()->user()->name ?? 'User' }}
      </a>
    </div>
  </nav>
  <div class="donate-wrap">
    <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}" alt="Brand" width="110">
    <h2 class="donate-title">Donate Us</h2>
    <img src="{{ asset('photo/Promptpay.webp') }}" alt="QR Code" class="donate-qr">
    <div class="donate-company">Rubrak Pet Care Co., Ltd.</div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>