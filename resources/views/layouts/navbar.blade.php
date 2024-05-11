<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? config('app.name', 'laravel')}}</title>
    <!-- iconscout cdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
    <div class="container">
            <h2 class="log">
                <b>Sparkling Water</b>
            </h2>
            <!-- search bar -->
            <div class="search-bar">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="search">
            </div>
            <div class="search-button">
                <input type="button" value="search" class="btn btn-primary">
            </div>

            <!-- Dropdown menu -->
            <div class="dropdown">
                <button class="dropdown-btn">
                    <div class="profile-photo profile">
                        <img src="#" alt="user's pp">
                    </div>
                </button>
                <div name="content" class="dropdown-content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>