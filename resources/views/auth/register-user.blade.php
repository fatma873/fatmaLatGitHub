<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register User - fatmaApp</title>
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
      border-radius: 10px;
      transition: all 0.3s ease;
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
      top: 50px;
      right: 14px;
      transform: translateY(-50%);
      cursor: pointer;
      z-index: 2;
    }

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
  <h2>Registrasi</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('register.user') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Alamat Email</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
    </div>

    <div class="mb-4 position-relative">
      <label for="password" class="form-label">Kata Sandi</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>

      <!-- Toggle Eye -->
      <span class="toggle-eye" onclick="togglePassword()">
        <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6c63ff" style="width: 24px; height: 24px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
        </svg>

        <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6c63ff" style="width: 24px; height: 24px; display: none;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
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
      eyeOpen.style.display = 'inline';
      eyeClosed.style.display = 'none';
    } else {
      input.type = 'password';
      eyeOpen.style.display = 'none';
      eyeClosed.style.display = 'inline';
    }
  }
</script>

</body>
</html>
