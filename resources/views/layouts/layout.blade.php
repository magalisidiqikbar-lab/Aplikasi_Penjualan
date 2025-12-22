<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>QuantumMart Admin</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

  <style>
    :root {
        --primary-purple: #6f42c1;
        --light-purple: #f3f0ff;
        --dark-purple: #5227a1;
        --accent-purple: #a29bfe;
    }

    body {
        background-color: #f8f7ff;
        font-family: 'Poppins', sans-serif;
    }

    /* Navbar Ungu Modern */
    .header_area {
        background: white;
        border-bottom: 2px solid var(--light-purple);
        box-shadow: 0 4px 20px rgba(111, 66, 193, 0.05);
        padding: 10px 0;
    }

    .main_menu .navbar-brand {
        font-weight: 800;
        color: var(--primary-purple) !important;
        font-size: 24px;
    }

    .nav-item .nav-link {
        color: #555 !important;
        font-weight: 600;
        margin: 0 10px;
        transition: 0.3s;
    }

    .nav-item .nav-link:hover, .nav-item.active .nav-link {
        color: var(--primary-purple) !important;
        transform: translateY(-2px);
    }

    /* Card Styling */
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(111, 66, 193, 0.08);
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    /* Button Ungu Gede */
    .btn-primary {
        background: linear-gradient(45deg, var(--primary-purple), var(--accent-purple));
        border: none;
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(111, 66, 193, 0.2);
    }

    .btn-primary:hover {
        background: var(--dark-purple);
        box-shadow: 0 6px 20px rgba(111, 66, 193, 0.4);
    }

    /* Tabel Header Ungu */
    .thead-purple {
        background-color: var(--light-purple);
        color: var(--primary-purple);
    }

    .badge-purple {
        background-color: var(--light-purple);
        color: var(--primary-purple);
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 12px;
    }

    /* Dropdown Profile */
    .dropdown-menu {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
  </style>
  @yield('css')
</head>
<body>
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="{{ route('dashboard') }}">QuantumMart</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">Kategori</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">Produk</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Pesanan</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('reports.index') }}">Laporan</a></li>
            </ul>

            <ul class="nav-shop">
              @auth
                <li class="nav-item submenu dropdown border-left pl-3">
                    <a href="#" class="nav-link dropdown-toggle font-weight-bold" data-toggle="dropdown" style="color: var(--primary-purple) !important;">
                        <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <main class="py-5">
      @yield('main')
  </main>

  <script src="{{asset('assets/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('assets/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  @yield('js')
</body>
</html>