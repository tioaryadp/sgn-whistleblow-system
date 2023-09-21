<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Dashboard - WBS PT. Sinergi Gula Nusantara</title>
    <link rel="icon" type="image/png" href="img/logo_raw.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_profile"> {{ Auth::user()->name }} </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="/" class="nav_logo"><img src="/img/logo_polos.png" class="logo"> <span class="nav_logo-name">WBS</span></a>
                <div class="nav_list"> 
                    <a href="/dashboard" class="nav_link"> <i class='bx bxs-dashboard nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                    <a href="/tiket" class="nav_link"> <i class='bx bxs-coupon nav_icon'></i> <span class="nav_name">Tiket</span> </a>
                    <a href="/content" class="nav_link"> <i class='bx bxs-book-content nav_icon'></i> <span class="nav_name">Web Content</span> </a> 
                    <a href="/master" class="nav_link"> <i class='bx bxs-data nav_icon'></i> <span class="nav_name">Master Data</span> </a> 
                    <a href="/user" class="nav_link"> <i class='bx bxs-user-plus nav_icon'></i> <span class="nav_name">User Registration</span> </a> 
                </div>
            </div> 
            <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                <i class='bx bxs-log-out nav_icon'></i> <span class="nav_name">Sign Out</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> 
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="content">
        <h4> @yield('judul_halaman') </h4>
        <br>
        @yield('back-konten')
    </div>
    <!--Container Main end-->
    <script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>
