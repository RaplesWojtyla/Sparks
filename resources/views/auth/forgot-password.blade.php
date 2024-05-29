<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('icon/sparksicon.png') }}" type="x-icon">
    <link rel="stylesheet" href="{{ asset('css/styleverifyemail.css') }}">
    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('icon/sparksicon.png') }}" alt="Logo" class="logo">
        </div>
        <div class="grater">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="verification">
                {{ __('We have emailed your password reset link.') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
        <div class="input-group">
            <x-input-label for="email" :value="__('Email')" class="input-label-class"/>
            <x-text-input id="email" class="text-input-class" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')"    class="mt-2 error-message-class" />
        </div>
                @csrf

                <div>
                    <button type="submit" class="resend">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
