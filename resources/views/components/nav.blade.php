
<header class="sticky-top" id="header" >

    <nav class="navbar navbar-top">
    <div class="container">
        <div class="row align-items-center w-100 g-3">
        <!-- Logo -->
        <div class="col-12 col-md-2 text-center text-md-start">
            <a class="navbar-brand d-inline-flex align-items-center" href="{{ url(app()->getlocale().'/') }}">
            <x-application-logo/>
            </a>
        </div>

        <!-- Search Box -->
        <div class="col-12 col-md-6 order-1 order-md-0 mt-3 mt-md-0">
            <form class="d-flex search-box">
            <input class="form-control search-input" type="search" placeholder="Search stores for coupons, deals..." aria-label="Search">
            <button class=" search-button " type="submit">
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
                <a class="nav-link" href="{{ route('deals' ,['lang'=> app()->getlocale()]) }}">
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

