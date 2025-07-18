<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - fatmaApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet"/>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom right, #fdfbfb, #ebedee);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .register-container {
      background: #fff;
      padding: 2.5rem;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 450px;
      animation: fadeIn 1s ease;
    }

    h2 {
      font-weight: 600;
      color: #2d3142;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .form-control {
      border-radius: 10px;
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: #6c63ff;
      box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.2);
    }

    .btn-primary {
      background-color: #6c63ff;
      border: none;
      transition: all 0.3s ease;
      border-radius: 10px;
    }

    .btn-primary:hover {
      background-color: #5548c8;
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(108, 99, 255, 0.3);
    }

    .text-center a {
      color: #6c63ff;
      text-decoration: none;
    }

    .text-center a:hover {
      text-decoration: underline;
    }

    .toggle-eye {
        position: absolute;
        top: 0;
        right: 12px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #6c63ff;
        z-index: 2;
    }

    /* Tambahin ini biar ruang untuk icon cukup */
    input[type="password"],
    input[type="text"] {
    padding-right: 45px !important;
    }


    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<div class="register-container">
  <h2>Daftar Akun</h2>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }} <br>
      <a href="{{ route('login') }}">Klik di sini untuk login</a>
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Alamat Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
    </div>

<div class="mb-4 position-relative">
  <label for="password" class="form-label">Kata Sandi</label>
  <input type="password" class="form-control pr-5" id="password" name="password" placeholder="Masukkan password" required>

  <span class="toggle-eye" onclick="togglePassword()">
    <!-- Eye open -->
    <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#6c63ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
      <circle cx="12" cy="12" r="3" />
    </svg>

    <!-- Eye closed -->
    <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#6c63ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
      <path d="M17.94 17.94L6.06 6.06" />
      <path d="M1 12s4-8 11-8a10.5 10.5 0 0 1 5.06 1.34" />
      <path d="M23 12s-4 8-11 8a10.5 10.5 0 0 1-5.06-1.34" />
      <path d="M14.12 14.12A3 3 0 0 1 9.88 9.88" />
    </svg>
  </span>
</div>


    <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>

    <p class="text-center mt-4">
      Udah punya akun? <a href="{{ route('login') }}">Login yuk</a>
    </p>
  </form>
</div>

<script>
  function togglePassword() {
    const input = document.getElementById('password');
    const eyeOpen = document.getElementById('eye-open');
    const eyeClosed = document.getElementById('eye-closed');

    if (input.type === 'password') {
      input.type = 'text';
      eyeOpen.style.display = 'none';
      eyeClosed.style.display = 'inline';
    } else {
      input.type = 'password';
      eyeOpen.style.display = 'inline';
      eyeClosed.style.display = 'none';
    }   
  }
</script>

</body>
</html>
=