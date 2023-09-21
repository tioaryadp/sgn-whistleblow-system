<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Title -->
        <title>Whistleblow System SGN</title>
        <link rel="icon" type="image/png" href="img/logo_raw.png"/>

        <!-- Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="css/home.css">
    </head>

    <body class="antialiased">
        <header>
            <a href="/"><img src="img/logo.png" class="logo"></a>
            <i class="fa-solid fa-bars toggle-btn"></i>
            <nav class="navbar">
                <a href="/" style="--i:1">Beranda</a>
                <a href="/rights" style="--i:2">Kebijakan</a>
                <a href="/faq" style="--i:3">FAQ</a>
            </nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="auth" style="--i:4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="auth" style="--i:5">Login</a>
                    @if (Route::has('reqister'))
                        <a href="{{ route('register') }}" class="auth" style="--i:6">Register</a>
                    @endif
                @endauth
            @endif
            <div class="bg-nav"></div>
        </header>

        @yield('front-konten')

        <script src="js/home.js"></script>
    </body>
</html>
