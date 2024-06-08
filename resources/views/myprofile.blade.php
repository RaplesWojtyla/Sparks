<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('icon/sparksicon.png') }}" type="x-icon">
    <title>My Profile Page</title>
    <!-- iconscout cdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
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
                    <li><span>{{ $user->follower()->count() }}</span>Followers</li>
                    <li><span>{{ $user->following()->count() }}</span>Following</li>
                </ul>

                <div class="content">
                    <p>{{ $user->bio }}</p>
                </div>
                <a href="{{ route('dashboard') }}" class="btn">Sparks</a>
            </div>
            <div class="right__col">
                <nav>
                    <ul>
                        <li><a href="?section=posts" class="active" id="postsLink">posts</a></li>
                        <li><a href="?section=saved" id="savedLink">saved</a></li>
                    </ul>

                    <form action="{{ route('profile.edit', Auth::user()) }}" method="GET">
                        @csrf
                        <button>Edit Profile</button>
                    </form>
                </nav>

                <!-- Post Modal Structure -->
                <div id="postModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="modal-body2"></div>
                        <div class="modal-body">
                            <div class="feeds">
                                @foreach ($posts as $post)
                                    <div class="feed" id="feed-{{ $post->id }}" style="display: none;">
                                        <div class="head">
                                            <div class="user">
                                                <div class="profile-photo">
                                                    <img src="{{ asset($post->users->profile_picture) }}">
                                                </div>

                                                <h3>{{ $post->users->name }}</h3>
                                            </div>
                                            <small>Posted At: {{ Carbon::parse($post->created_at)->format('d-m-Y') }}</small>
                                            <div class="post-options">
                                                <span class="edit" onclick="toggleDropdown(this)">
                                                    <i class="uil uil-ellipsis-h"></i>
                                                </span>
                                                <div class="dropdown-menu">
                                                    <a onclick="deletePost({{ $post->id }})" style="cursor: pointer;">Delete</a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="photo">
                                            @if ($post->filePosts->first() != null)
                                                <img src="{{ asset($post->filePosts->first()->berkas) }}">
                                            @endif
                                        </div>

                                        <div class="caption">
                                            <p><b>{{ $post->users->username }}</b> {{ $post->caption }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photos Section -->
                <div class="photos" id="post">
                    @foreach ($posts as $post)
                        @if ($post->filePosts->first() != null)
                            <img src="{{ asset($post->filePosts->first()->berkas) }}" alt="Photo postingan"
                                class="photo-thumbnail" data-post-id="{{ $post->id }}" />
                        @endif
                    @endforeach
                </div>

                <!-- Bookmark Modal -->
                <div id="bookmark-modal" class="modal">
                    <div class="modal-content">
                        <span class="close-2">&times;</span>
                        <div class="modal-body-bookmarks-2"></div>
                        <div class="modal-body">
                            <div class="feeds">
                                @foreach ($bookmarks as $bookmark)
                                    @if ($bookmark->post->filePosts->first() != null)
                                    <div class="feed" id="bookmark-{{ $bookmark->id_post }}" style="display: none;">
                                        <div class="head">
                                            <div class="user">
                                                <div class="profile-photo">
                                                    <img src="{{ asset($bookmark->post->users->profile_picture) }}">
                                                </div>

                                                <h3>{{ $bookmark->post->users->name }}</h3>
                                            </div>
                                            <small>Posted At: {{ Carbon::parse($bookmark->post->created_at)->format('d-m-Y') }}</small>
                                            <div class="post-options">
                                                <span class="edit" onclick="toggleDropdown(this)">
                                                    <i class="uil uil-ellipsis-h"></i>
                                                </span>
                                                <div class="dropdown-menu">
                                                    <a onclick="deleteBookmark({{ $bookmark->id_post }})" style="cursor: pointer;">Unsave</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="photo">
                                            @if ($bookmark->post->filePosts->first() != null)
                                                <img src="{{ asset($bookmark->post->filePosts->first()->berkas) }}" />
                                            @endif
                                        </div>

                                        <div class="caption">
                                            <p><b>{{ $bookmark->post->users->username }}</b> {{ $bookmark->post->caption }}
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="photos" id="saved" style="display: none;">
                    @foreach ($bookmarks as $bookmark)
                        @if ($bookmark->post->filePosts->first() != null)
                            <img src="{{ asset($bookmark->post->filePosts->first()->berkas) }}"
                               class="bookmark-thumbnail" alt="Photo postingan yang di save" data-bookmark-id="{{ $bookmark->id_post }}" />
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function deletePost(postId) 
        {
            if (!confirm(`Hapus postingan ini?`)) return;

            fetch(`/post/${postId}/delete`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success)
                {
                    alert(data.message);
                    location.reload();
                }
                else alert(data.message);
            })
            .catch(error => {
                console.error('Error: ', error);
                alert('Terjadi kesalahan saat menghapus post tersebut.');
            });
        }
    </script>
    
    <script>
        function deleteBookmark(bookmarkId) 
        {
            if (!confirm(`Hapus postingan ini dari bookmark?`)) return;

            fetch(`/post/bookmark/${bookmarkId}/delete`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success)
                {
                    alert(data.message);
                    location.reload();
                }
                else alert(data.message);
            })
            .catch(error => {
                console.error('Error: ', error);
                alert('Terjadi kesalahan saat menghapus post tersebut.');
            });
        }
    </script>

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

        document.addEventListener('DOMContentLoaded', function() {
            // Get the modal
            const modal = document.getElementById("postModal");
            const span = document.getElementsByClassName("close")[0];
            const images = document.getElementsByClassName('photo-thumbnail');

            // Loop through each image and add click event
            Array.from(images).forEach(function(image) {
                image.onclick = function() {
                    var postId = this.getAttribute('data-post-id');
                    var postContent = document.getElementById('feed-' + postId).innerHTML;

                    // Insert content into the modal
                    modal.querySelector('.modal-body2').innerHTML = postContent;

                    // Display the modal
                    modal.style.display = "block";
                }
            });

            const bookmarkModal = document.getElementById("bookmark-modal");
            const span2 = document.getElementsByClassName("close-2")[0];
            const bookmarkImages = document.getElementsByClassName('bookmark-thumbnail');

            Array.from(bookmarkImages).forEach(function(img) {
                img.onclick = function() {
                    const bookmarkId = this.getAttribute('data-bookmark-id');
                    const bookmarkContent = document.getElementById('bookmark-' + bookmarkId).innerHTML;

                    bookmarkModal.querySelector('.modal-body-bookmarks-2').innerHTML = bookmarkContent;
                    bookmarkModal.style.display = "block";
                }
            });

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
            
            span2.onclick = function() {
                bookmarkModal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });

        function toggleDropdown(element) {
            var dropdown = element.nextElementSibling;
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.edit, .edit *')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }
    </script>
</body>

</html>