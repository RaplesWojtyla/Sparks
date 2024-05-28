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
    <div class="left">
        <a class="profile">
            <div class="profile-photo">
                <img src="{{asset(Auth::user()->profile_picture)}}">
            </div>
            <div class="handle">
                <h4>{{ Auth::user()->name }}</h4>
                <p class="text-muted">
                    {{'@' . Auth::user()->username}}
                </p>
            </div>
        </a>

        <!----------------- SIDEBAR -------------------->
        <div class="sidebar">
            <a class="menu-item active">
                <span><i class="uil uil-home"></i></span>
                <h3>Home</h3>
            </a>
            <a class="menu-item" id="exploreMenuItem">
                <span><i class="uil uil-compass"></i></span>
                <h3>Explore</h3>
            </a>
            <a class="menu-item" id="notifications">
                <span><i class="uil uil-bell"></i></span>
                <h3>Notification</h3>
                <!--------------- NOTIFICATION POPUP --------------->
                @include('layouts.notif')
                <!--------------- END NOTIFICATION POPUP --------------->
            </a>
            <a class="menu-item" id="messages-notifications" href="{{ url('/chatify') }}" , target="_blank">
                <span><i class="uil uil-envelope-alt"></i></span>
                <h3>Messages</h3>
            </a>
            <a class="menu-item" href="{{ route('profile.show', Auth::user()->id) }}?section=saved">
                <span><i class="uil uil-bookmark"></i></span>
                <h3>Bookmarks</h3>
            </a>
            <a class="menu-item" id="theme">
                <span><i class="uil uil-palette"></i></span>
                <h3>Theme</h3>
            </a>
            <a class="menu-item" href="{{ route('profile.edit') }}">
                <span><i class="uil uil-setting"></i></span>
                <h3>Setting</h3>
            </a>
            <a class="menu-item" href="{{ route('info') }}">
                <span><i class="uil uil-info-circle"></i></span>
                <h3>Info</h3>
            </a>
        </div>
        <!----------------- END OF SIDEBAR -------------------->
        <label class="btn btn-primary" for="create-post" id="create">Create Post</label>    
    </div>
    <!----------------- THEME CUSTOMIZATION -------------------->
   
</body>

</html>