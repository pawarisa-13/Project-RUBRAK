<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donate</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
    font-family: 'Prompt', sans-serif;
    background: #fff;
    }

    :root {
  --brand: #2f4b9c;  
  --ink: #2f4b9c;
  --cream: #fffdf8ff;
    }

    .navbar {
    background: var(--cream); 
    padding: 14px 18px;
    box-shadow: 0 23px 0 var(--brand);
    border-bottom: none;
    }


    .navbar-brand,
    .navbar .nav-link {
    color: var(--ink);
    font-weight: 500;
    }

    .navbar .nav-link {
    margin: 0 16px;
    position: relative;
    }

    .navbar .nav-link.active {
    font-weight: 700;
    }

    .navbar .nav-link.active::after {
    content: "";
    position: absolute;
    bottom: -6px;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--brand);
    }

    .btn-user {
    border: 2px solid var(--brand);
    border-radius: 40px;
    background: #fff;
    color: var(--ink);
    padding: 6px 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
    text-decoration: none;
    }

    .btn-user:hover {
    background: var(--brand);
    color: #fff;
    }

    .btn-user img {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    }

    .donate-wrap {
    text-align: center;
    padding: 50px 16px;
    }

    .donate-title {
    color: var(--ink);
    font-weight: 600;
    margin-top: 18px;
    }

    .donate-qr {
    width: 220px;
    max-width: 70vw;
    border: 2px solid var(--brand);
    border-radius: 6px;
    padding: 6px;
    margin-top: 14px;
    }

    .donate-company {
    color: var(--ink);
    font-size: 20px;
    margin-top: 16px;
    }   
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('photo/IMG_6709.png') }}" alt="Rub Rak" width="36" class="me-2">
        Rub Rak
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto">
            <!-- อย่าลืมลิ้งไปหน้าอื่น!!!!!!! -->
        <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/pet ">Pet</a></li>
        <li class="nav-item"><a class="nav-link active" href="/donate">Donate</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact us">Contact Us</a></li>
        </ul>
      </div>

      <a class="btn-user" href="{{ url('/profile') }}">
        Hello!, {{ auth()->user()->name ?? 'User' }}
      </a>
    </div>
  </nav>
  <div class="donate-wrap">
    <img src="{{ asset('photo/IMG_6709.png') }}" alt="Brand" width="110">
    <h2 class="donate-title">Donate Us</h2>
    <img src="{{ asset('photo/Promptpay.webp') }}" alt="QR Code" class="donate-qr">
    <div class="donate-company">Rubrak Pet Care Co., Ltd.</div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>