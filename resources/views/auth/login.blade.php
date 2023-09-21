@extends('front.front-master')
@section('front-konten')

<head>
    <!-- Styles -->
    <link rel="stylesheet" href="css/login.css">
</head>

<main>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="email">{{ __('Username') }}</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">{{ __('Password') }}</label>
                </div>
                <div class="remember-forgot">
                    <label for="remember"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}</label>
                </div>
                <button type="submit" class="btn-noanim"><span></span>{{ __('Login') }}</button>
            </form>
        </div>
    </div>
</main>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
