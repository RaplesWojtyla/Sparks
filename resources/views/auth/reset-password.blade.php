<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('icon/sparksicon.png') }}" type="x-icon">
    <link rel="stylesheet" href="{{ asset('css/styleconfirimpass.css') }}">
    <title>Password Confirmation</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
        <div class="input-group">
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
           <!-- Input untuk Email -->
<div>
    <x-input-label for="email" :value="__('Email')" class="input-label-class" />
    <x-text-input id="email" class="text-input-class" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="error-message-class" />
</div>

<!-- Input untuk Password -->
<div>
    <x-input-label for="password" :value="__('Password')" class="input-label-class" />
    <x-text-input id="password" class="text-input-class" type="password" name="password" required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password')" class="error-message-class" />
</div>

<!-- Input untuk Konfirmasi Password -->
<div>
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="input-label-class" />
    <x-text-input id="password_confirmation" class="text-input-class" type="password" name="password_confirmation" required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message-class" />
</div>
        </div>
                <div>
                    <button type="submit" class="resend">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
