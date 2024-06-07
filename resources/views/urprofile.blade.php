<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Profile Page</title>
    <link rel="icon" href="{{ asset('icon/sparksicon.png') }}" type="x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/urstyle.css') }}" />
</head>

<body>

    <body>
        <div class="header__wrapper">
            <header></header>
            <div class="cols__container">
                <div class="left__col">
                    <div class="img__container">
                        <img src="{{ asset($user->profile_picture) }}" alt="Anna Smith" />
                        <span></span>
                    </div>
                    <h2>{{ $user->username }}</h2>
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>

                    <ul class="about">
                        <li><span>{{ $user->follower()->count() }}</span>Followers</li>
                        <li><span>{{ $user->following()->count() }}</span>Following</li>
                    </ul>

                    <div class="content">
                        <p>
                            {{ $user->bio }}
                        </p>
                    </div>
                    <a href="{{ route('dashboard') }}" class="btn">Sparks</a>
                </div>
                <div class="right__col">
                    <nav>
                        @if (Auth::user()->following->contains($user->id))
                        <form action="{{ route('unfollow', $user) }}" method="post">
                            @csrf
                            <button>Unfollow</button>
                        </form>
                        @else
                        <form action="{{ route('follow', $user) }}" method="post">
                            @csrf
                            <button>Follow</button>
                        </form>
                        @endif
                        <div class="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                            <path d="M3 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm5 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm5 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        </svg>
                        <div class="dropdown-content">
                            <a href="#" id="report-btn">Report</a>
                        </div>
                    </div>
                    </nav>

                    <div class="photos">
                        @foreach ($posts as $post)
                        @if ($post->filePosts->first() != null)
                        <img src="{{ asset($post->filePosts->first()->berkas) }}" alt="Photo postingan" />
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('report-btn').addEventListener('click', function() {
                const reason = prompt("Why do you want to report this user?");
                if (reason) {
                    alert("You reported this user for: " + reason);
                    // Here you can add your AJAX call to send the report to the server
                }
            });
        </script>
    </body>

</html>