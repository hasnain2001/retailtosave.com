<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RetailToSave Navbar</title>

  <style>
    :root {
      --primary-red: #e63946;
      --dark-bg: #1a1a1a;
      --light-gray: #f8f9fa;
      --medium-gray: #e9ecef;
      --dark-gray: #343a40;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    #header {
        position:sticky;
        top: 0;
        width: 100%;
        transition: transform 0.3s ease;
        z-index: 999;
      }


    .navbar-top {
      background-color: var(--dark-bg);
      padding: 15px 0;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
      height: 50px;
      transition: transform 0.3s ease;
    }

    .navbar-brand:hover img {
      transform: scale(1.05);
    }

    .search-box {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
    }

    .search-input {
      border-radius: 25px 0 0 25px !important;
      border: 1px solid #ced4da;
      border-right: none;
      padding: 10px 20px;
      box-shadow: none;
    }

    .search-input:focus {
      box-shadow: 0 0 0 0.25rem rgba(230, 57, 70, 0.25);
      border-color: var(--primary-red);
    }

    .search-button {
      border-radius: 0 25px 25px 0 !important;
      background-color: var(--primary-red);
      color: white;
      border: none;
      padding: 0 20px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .search-button:hover {
      background-color: #c1121f;
      transform: translateY(-1px);
    }

    .navbar-main {
      background-color: #fff;
      border-bottom: 1px solid #ddd;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
       margin-left: 50px;
       margin-right: 50px;
    }

    .nav-link {
      color: var(--dark-gray) !important;
      font-weight: 600;
      padding: 10px 15px !important;
      margin: 0 5px;
      border-radius: 5px;
      transition: all 0.3s ease;
      position: relative;
    }

    .nav-link:hover {
      color: var(--primary-red) !important;
      background-color: var(--light-gray);
    }

    .nav-link.active {
      color: var(--primary-red) !important;
    }

    .nav-link.active:after {
      content: '';
      position: absolute;
      bottom: -1px;
      left: 15px;
      right: 15px;
      height: 3px;
      background-color: var(--primary-red);
      border-radius: 3px 3px 0 0;
    }

    .icon-text {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.95rem;
      color: var(--dark-gray);
      padding: 8px 12px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .icon-text i {
      font-size: 1.1rem;
    }

    .icon-text:hover {
      background-color: var(--light-gray);
      color: var(--primary-red);
      transform: translateY(-1px);
    }

    .language-selector .dropdown-toggle {
      border-radius: 25px !important;
      background: #2b2b2b !important;
      color: #fff !important;
      padding: 8px 15px !important;
      border: 1px solid #444 !important;
      transition: all 0.3s ease;
    }

    .language-selector .dropdown-toggle:hover {
      background: #333 !important;
    }

    .dropdown-menu {
      border: none !important;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
      padding: 8px 15px !important;
      border-radius: 5px !important;
      transition: all 0.2s ease;
    }

    .dropdown-item:hover {
      background-color: var(--primary-red) !important;
      color: white !important;
    }

    .navbar-toggler {
      border: none;
      padding: 8px;
    }

    .navbar-toggler:focus {
      box-shadow: 0 0 0 0.25rem rgba(230, 57, 70, 0.25);
    }

    @media (max-width: 991.98px) {
      .navbar-collapse {
        padding-top: 15px;
      }

      .nav-link {
        margin: 5px 0;
      }

      .icon-text {
        justify-content: flex-start;
        margin: 5px 0;
      }

      .language-selector {
        margin-top: 15px;
      }
    }
  </style>
</head>
<body>

<header class="sticky-top" id="header" >

    <nav class="navbar navbar-top">
    <div class="container">
        <div class="row align-items-center w-100 g-3">
        <!-- Logo -->
        <div class="col-12 col-md-3 text-center text-md-start">
            <a class="navbar-brand d-inline-flex align-items-center" href="{{ url(app()->getlocale().'/') }}">
            <x-application-logo/>
            </a>
        </div>

        <!-- Search Box -->
        <div class="col-12 col-md-6 order-1 order-md-0 mt-3 mt-md-0">
            <form class="d-flex search-box">
            <input class="form-control search-input" type="search" placeholder="Search stores for coupons, deals..." aria-label="Search">
            <button class="btn search-button" type="submit">
                <i class="bi bi-search me-1"></i>
            </button>
            </form>
        </div>

        <!-- Language Dropdown -->
        <div class="col-12 col-md-3 order-0 order-md-1 d-flex justify-content-center justify-content-md-end">
            <div class="dropdown language-selector">
            <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('uploads/flags/' . $langs->firstWhere('code', app()->getLocale())->flag) }}" width="22" height="15" class="me-2 rounded shadow-sm" style="object-fit:cover;">
                <span class="fw-semibold">{{ $langs->firstWhere('code', app()->getLocale())->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                    @foreach ($langs as $lang)
                    <li>
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ url('/' . $lang->code) }}">
                        <img src="{{ asset('uploads/flags/' . $lang->flag) }}" width="22" height="15" class="rounded shadow-sm">
                        <span>{{ $lang->name }}  <small class="text-muted">({{ strtoupper($lang->code) }})</small></span>
                    </a>
                    </li>
                    @endforeach
            </ul>
            </div>
        </div>
        </div>
    </div>
    </nav>
    <!-- Main Navbar (Menu Links) -->
    <nav class="navbar navbar-expand-lg navbar-main shadow">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url(app()->getlocale().'/') }}">
                    <i class="bi bi-house-door me-1"></i> HOME
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('stores', ['lang' => app()->getLocale()]) }}">
                    <i class="bi bi-shop me-1"></i> ALL STORES
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category', ['lang' => app()->getLocale()]) }}">
                    <i class="bi bi-grid-3x3-gap-fill me-1"></i> CATEGORIES
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('coupons' ,['lang'=> app()->getlocale()]) }}">
                    <i class="bi bi-ticket-perforated me-1"></i> COUPONS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-tags me-1"></i> DEALS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog' ,['lang'=> app()->getlocale()]) }}">
                    <i class="bi bi-journal-text me-1"></i> BLOG
                </a>
            </li>
        </ul>

        <div class="d-flex gap-2">
            @auth
                <div class="icon-text">
                    <i class="bi bi-speedometer2"></i>
                    <a href="{{ route('dashboard') }}" class="text-decoration-none">DASHBOARD</a>
                </div>
                @else
                    <div class="icon-text">
                    <i class="bi bi-power"></i>
                    <a href="{{ route('login') }}" class="text-decoration-none">LOGIN</a>
                </div>
                <div class="icon-text">
                    <i class="bi bi-person-plus"></i>
                    <a href="{{ route('register') }}" class="text-decoration-none">REGISTER</a>
                </div>
            @endauth
        </div>

        </div>
    </div>
    </nav>
</header>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('header');
    let lastScroll = window.scrollY;
    let ticking = false;

    function handleScroll() {
        const currentScroll = window.scrollY;

        if (currentScroll > lastScroll && currentScroll > 100) {
        // Scrolling down
        header.style.transform = 'translateY(-100%)';
        } else if (currentScroll < lastScroll) {
        // Scrolling up
        header.style.transform = 'translateY(0)';
        }

        lastScroll = currentScroll;
        ticking = false;
    }

    window.addEventListener('scroll', function () {
        if (!ticking) {
        window.requestAnimationFrame(handleScroll);
        ticking = true;
        }
    });
    });
</script>

</body>
</html>
