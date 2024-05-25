<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile Page</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}" />
</head>

<body>
    <div class="header__wrapper">
        <header></header>
        <div class="cols__container">
            <div class="left__col">
                <div class="img__container">
                    <img src="{{ asset($user->profile_picture) }}" alt="foto profil" />
                    <span></span>
                </div>
                <h2>{{ $user->username }}</h2>
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>

                <ul class="about">
                    <li><span>{{$user->follower()->count()}}</span>Followers</li>
                    <li><span>{{$user->following()->count()}}</span>Following</li>
                </ul>

                <div class="content">
                    <p>{{$user->bio}}</p>
                </div>

                <!-- <div class="">
              <a href="{{ route('dashboard') }}">Sparks</a>
            </div> -->
            </div>
            <div class="right__col">
                <nav>
                    <ul>
                        <li><a href="?section=posts" class="active" id="postsLink">posts</a></li>
                        <li><a href="?section=saved" id="savedLink">saved</a></li>
                    </ul>

                    <form action="{{ route('profile.edit') }}" method="GET">
                        @csrf
                        <button>Edit Profile</button>
                    </form>
                </nav>

                <div class="photos" id="post">
                    @foreach ($posts as $post)
						@if ($post->filePosts->first() != NULL)
                        	<img src="{{ asset($post->filePosts->first()->berkas) }}" alt="Photo postingan" />
						@endif
                    @endforeach
                </div>

                <div class="photos" id="saved" style="display: none;">
                    @foreach ($bookmarks as $bookmark)
                        @if ($bookmark->post->filePosts->first() != NULL)
                            <img src="{{ asset($bookmark->post->filePosts->first()->berkas) }}" alt="Photo postingan yang di save" />
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        const postsLink = document.getElementById('postsLink');
        const savedLink = document.getElementById('savedLink');
        const postSection = document.getElementById('post');
        const savedSection = document.getElementById('saved');

        const urlParams = new URLSearchParams(window.location.search);
        const section = urlParams.get('section');

        if (section === 'saved') {
            postSection.style.display = 'none';
            savedSection.style.display = 'grid';
            savedLink.classList.add('active');
            postsLink.classList.remove('active');
        } else {
            postSection.style.display = 'grid';
            savedSection.style.display = 'none';
            postsLink.classList.add('active');
            savedLink.classList.remove('active');
        }

        postsLink.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = '?section=posts';
        });

        savedLink.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = '?section=saved';
        });
    </script>
</body>

</html>