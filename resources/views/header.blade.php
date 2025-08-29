<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Responsive Header</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-info shadow">
  <div class="container-fluid">
    <!-- Brand Logo / Name -->
    <a class="navbar-brand fw-bold text-white" href="/">Navbar</a>

    <!-- Toggler Button (for Mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Left Side Menu -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active fw-bold text-white" aria-current="page" href="/">Home</a>
        </li>

        {{-- Show these only if user is logged in --}}
        @if(session()->has('user'))
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="/myorders">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="/add-product">Add Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="/all-products">Products</a>
          </li>
        @endif

      </ul>

      <!-- Right Side Menu -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        {{-- Show Add to Cart only if logged in --}}
        @if(session()->has('user'))
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="/cartlist">
              Add to Cart 🛒 
              <span class="badge bg-danger">{{ $cartCount ?? 0 }}</span>
            </a>
          </li>
        @endif

        @if(session()->has('user'))
          <!-- If user is logged in -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{ session('user')->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a href="/logout" class="dropdown-item text-danger fw-bold">Logout</a></li>
            </ul>
          </li>
        @else
          <!-- If user is NOT logged in -->
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="/login">Login</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li> -->
        @endif

      </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
