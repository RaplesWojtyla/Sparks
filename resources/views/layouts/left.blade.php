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
                        <img src="./images/profile-1.jpg">
                    </div>
                    <div class="handle">
                        <h4>nama pengguna</h4>
                        <p class="text-muted">
                            @username
                        </p>
                    </div>
                </a>

        <!----------------- SIDEBAR -------------------->
        <div class="sidebar">
            <a class="menu-item active">
                <span><i class="uil uil-home"></i></span>
                <h3>Home</h3>
            </a>
            <a class="menu-item">
                <span><i class="uil uil-compass"></i></span>
                <h3>Explore</h3>
            </a>
            <a class="menu-item" id="notifications">
                <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span>
                <h3>Notification</h3>
                <!--------------- NOTIFICATION POPUP --------------->
                <div class="notifications-popup">
                    <div>
                        <div class="profile-photo">
                            <img src="./images/profile-2.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Keke Benjamin</b> accepted your friend request
                            <small class="text-muted">2 Days Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-photo">
                            <img src="./images/profile-3.jpg">
                        </div>
                        <div class="notification-body">
                            <b>John Doe</b> commented on your post
                            <small class="text-muted">1 Hour Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-photo">
                            <img src="./images/profile-4.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Marry Oppong</b> and <b>283 Others</b> liked your post
                            <small class="text-muted">4 Minutes Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-photo">
                            <img src="./images/profile-5.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Doris Y. Lartey</b> commented on a post you are tagged in
                            <small class="text-muted">2 Days Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-photo">
                            <img src="./images/profile-6.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Keyley Jenner</b> commented on a post you are tagged in
                            <small class="text-muted">1 Hour Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-photo">
                            <img src="./images/profile-7.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Jane Doe</b> commented on your post
                            <small class="text-muted">1 Hour Ago</small>
                        </div>
                    </div>
                </div>
                <!--------------- END NOTIFICATION POPUP --------------->
            </a>
            <a class="menu-item" id="messages-notifications" href="{{ url('/chatify') }}" target="_blank">
                <span><i class="uil uil-envelope-alt"><small class="notification-count">6</small></i></span>
                <h3>Messages</h3>
            </a>
            <a class="menu-item">
                <span><i class="uil uil-bookmark"></i></span>
                <h3>Bookmarks</h3>
            </a>
            <a class="menu-item" id="theme">
                <span><i class="uil uil-palette"></i></span>
                <h3>Theme</h3>
            </a>
            <a class="menu-item">
                <span><i class="uil uil-setting"></i></span>
                <h3>Setting</h3>
            </a>
            <a class="menu-item">
                <span><i class="uil uil-info-circle"></i></span>
                <h3>Info</h3>
            </a>
        </div>
        <!----------------- END OF SIDEBAR -------------------->
        <label class="btn btn-primary" for="create-post">Create Post</label>
    </div>
    <!----------------- THEME CUSTOMIZATION -------------------->


</body>
</html>