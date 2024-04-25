<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <!-- iconscout cdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<main>
    <div class="container">
        <div class="left">
            <a class="profile">
                <div class="profile-photo">
                    <img src="{{ asset('images/img.png') }}" alt="user's pp">
                </div>
                <div class="handle">
                    <h4>nama pengguna</h4>
                    <p class="text-muted">
                        @username
                    </p>
                </div>
            </a>
            <div class="sidebar">
                <a class="menu-item active">
                    <span><i class="uil uil-user-square"></i></span><h3>Account</h3>
                </a>
                <a class="menu-class">
                    <span><i class="uil uil-house-user"></i></span><h3>Home</h3>
                </a>
                <a class="menu-class">
                    <span><i class="uil uil-compass"></i></span><h3>Explore</h3>
                </a>
                <a class="menu-class" id="notifications">
                    <span><i class="uil uil-bell"><small class="notification-count">1</small></i></span><h3>Notifications</h3>
                    <!-- notifications popup -->
                    <div class="notifications-popup">
                        <div>
                            <div class="profile-photo">
                                <img src="{{ asset('images/img.png') }}" alt="user's pp">
                            </div>
                            <div class="notifications-body">
                                <b>nama pengguna</b> liked your post
                                <small class="text-muted">1 HOUR AGO</small>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="menu-class">
                    <span><i class="uil uil-envelope" id="messages-notifications"><small class="notification-count"></small></i></span><h3>Messages</h3>
                </a>
                <a class="menu-class">
                    <span><i class="uil uil-user-alt"></i></span><h3>Friends</h3>
                </a>
                <a class="menu-class">
                    <span><i class="uil uil-palette"></i></span><h3>Theme</h3>
                </a>
                <a class="menu-class">
                    <span><i class="uil uil-setting"></i></span><h3>Settings</h3>
                </a>
                <a class="menu-class">
                    <span><i class="uil uil-comment-info-alt"></i></i></span><h3>Info</h3>
                </a>
            </div>
        </div>
        <label for="create-post" class="btn btn-primary">Create Post</label>
    </div>
</main>
</body>
</html>