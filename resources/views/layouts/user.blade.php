<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User - fatmaApp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
</head>
<body style="font-family: 'Poppins', sans-serif; background-color: #f5f7fa;">

<nav class="navbar navbar-expand-lg" style="background-color: #b2c7f5; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-dark" href="#">fatmaApp</a>
        <div class="d-flex">
            <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-dark">Logout</a>
        </div>
    </div>
</nav>


  <main>
    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
