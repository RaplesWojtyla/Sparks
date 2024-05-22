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
                <img src="{{ asset('img/user.jpeg') }}" alt="foto profil" />
                <span></span>
            </div>
            <h2>username</h2>
            <p>nama</p>
            <p>email</p>

            <ul class="about">
                <li><span>4,073</span>Followers</li>
                <li><span>322</span>Following</li>
            </ul>

            <div class="content">
                <p>hello, i'm using Sparks Social Media!</p>
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
                <button>edit profile</button>
            </nav>

            <div class="photos" id="post">
                <img src="{{ asset('img/img_1.avif') }}" alt="Photo postingan" />
                <img src="{{ asset('img/img_2.avif') }}" alt="Photo postingan" />
                <img src="{{ asset('img/img_3.avif') }}" alt="Photo postingan" />
                <img src="{{ asset('img/img_4.avif') }}" alt="Photo postingan" />
                <img src="{{ asset('img/img_5.avif') }}" alt="Photo postingan" />
                <img src="{{ asset('img/img_6.avif') }}" alt="Photo postingan" />
            </div>

            <div class="photos" id="saved" style="display: none;">
                <img src="{{ asset('img/img_1.avif') }}" alt="Photo postingan yang di save" />
                <img src="{{ asset('img/img_2.avif') }}" alt="Photo postingan yang di save" />
                <img src="{{ asset('img/img_3.avif') }}" alt="Photo postingan yang di save" />
                <img src="{{ asset('img/img_4.avif') }}" alt="Photo postingan yang di save" />
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

    postsLink.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = '?section=posts';
    });

    savedLink.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = '?section=saved';
    });
</script>
</body>
</html>
