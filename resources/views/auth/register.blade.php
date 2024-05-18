<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Sparks</title>
        <link rel="stylesheet" href="{{ asset('css/styleregisterpage.css') }}"
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
        <h2>Sparkling your memory to universe</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. fwfiwhfi
        </p>
        <a href="#">Get Started</a>
        </div>

        <div class="wrapper-login">
            <h2>Member Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <!-- Username -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    <label>Your Username</label>
                </div>

                <!-- Name -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <label>Your Name</label>
                </div>

                <!-- Email -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <label>Your Email</label>
                </div>

                <!-- Password -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <label>Your Password</label>

                <!-- Confirm Password -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />            

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <label>Confirm Password</label>
                </div>

                <button type="submit" class="btn">Register</button>
                <div class="register-link">
                    <p>Already Register <a href="#">Sign in now!</a></p>
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
