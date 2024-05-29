<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('icon/sparksicon.png') }}" type="x-icon">
        <title>Sparks</title>
        <link rel="stylesheet" href="{{ asset('css/stylelandingpage.css') }}"
        
    </head>
    <header class="header">
        <a href="#" class="logo"><ion-icon name="sparkles-sharp"></ion-icon>Sparks</a>
        <nav class="nav">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard </a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>
    </header>

    <section class="home">
        <div class="content">
        <h2>"Sparkling your memory to universe"</h2>
        <p>"Unlock the secrets of the universe within your memories with Sparks, where each spark ignites a cascade of recollections, illuminating the vast expanse of your consciousness with its ethereal glow."
        </p>
        <a href="{{ route('register') }}">Get Started</a>
        </div>

        <div class="wrapper-login">
            <h2>Member Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <x-text-input id="input_type" class="block mt-1 w-full" type="text" name="input_type" :value="old('input_type')" required autofocus autocomplete="input_type" />
                    <x-input-error :messages="$errors->get('input_type')" class="mt-2" />
                    <label>Enter Your Username/Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <label>Enter Your Password</label>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="{{ route('password.request') }}">Forgot password</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="register-link">
                    <p>Not a Member? <a href="{{ route('register') }}">Sign up now</a></p>
                </div>
            </form>
        </div>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

                </div>
            </div>
        </div>
    </body>
</html>
