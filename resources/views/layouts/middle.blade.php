<?php

use Illuminate\Support\Carbon;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? config('app.name', 'laravel')}}</title>
    <!-- iconscout cdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!----------------- MIDDLE -------------------->
    <div class="middle">
        <!----------------- STORIES -------------------->
        <div class="stories">
            <div class="story">
                <div class="profile-photo">
                    <img src="./images/profile-8.jpg">
                </div>
                <p class="name">Your Story</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="./images/profile-9.jpg">
                </div>
                <p class="name">your friend's story</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="./images/profile-10.jpg">
                </div>
                <p class="name">your friend's story</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="./images/profile-11.jpg">
                </div>
                <p class="name">your friend's story</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="./images/profile-12.jpg">
                </div>
                <p class="name">your friend's story</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="./images/profile-13.jpg">
                </div>
                <p class="name">your friend's story</p>
            </div>
        </div>
        <!----------------- END OF STORIES -------------------->

        <!----------------- FEEDS -------------------->
        <div class="feeds">
            @foreach ($posts as $post)
            <div class="feed">
                <div class="head">
                    <div class="user">
                        <div class="profile-photo">
                            <img src="{{ asset($post->users->profile_picture) }}">
                        </div>
                        <div class="info">
                            <h3>{{ $post->users->username }}</h3>
                            <small>{{Carbon::parse($post->created_at)->format('d-m-Y')}}</small>
                            {{-- DB::table('post')->select(DB::raw('TIMESTAMPDIFF(DAY, created_at, NOW()) as duration'))->get(); --}}
                        </div>
                    </div>
                    <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                    </span>
                </div>

                <div class="photo">
                    <img src="./images/feed-3.jpg">
                </div>

                <div class="action-buttons">
                    <div class="interaction-buttons" data-post-id="{{ $post->id }}">
                        <button id="likeButton" class="like-button" data-post-id="{{ $post->id }}" data-likes-count-id="likes-count-{{$post->id}}">
                        <i class="fa-regular fa-heart"></i>   
                        <i class="fa-solid fa-heart" style="color: red; display: none;"></i>                     
                        </button>
                        <span><i class="uil uil-comment-dots"></i></span>
                    </div>
                    <div class="bookmark">
                        <span><i class="fa-regular fa-bookmark"></i>
                        <i class="fa-solid fa-bookmark" style="display: none;"></i>
                        </span>
                    </div>
                </div>

                <div class="liked-by">
                    <!-- <span><img src="./images/profile-11.jpg"></span>
                            <span><img src="./images/profile-5.jpg"></span>
                            <span><img src="./images/profile-16.jpg"></span> -->
                    <p id="likes-count-{{$post->id}}">{{ $post->likes()->count() }}</p>
                    <!-- <p>Liked by <b>Diana Rose</b> and <b>2, 323 others</b></p> -->
                </div>

                <div class="caption">
                    <p><b>{{ $post->users->username }}</b> {{ $post->caption }}
                        <span class="harsh-tag">#lifestyle</span>
                    </p>
                </div>

                <div class="comments text-muted">
                    @if ($post->commments()->count() > 0)
                        View All {{ $post->commments()->count() }} Comments
                        @else
                            No Comment Yet
                    @endif

                </div>
            </div>
            @endforeach
        </div>
        <!----------------- END OF FEEDS -------------------->
    </div>
    <!----------------- END OF MIDDLE -------------------->

<script>
// script.js
// script.js
const likeButtons = document.querySelectorAll('.like-button');

likeButtons.forEach(button => {
  button.addEventListener('click', () => {
    const heartIcon = button.querySelector('.fa-regular.fa-heart'); // Target the line heart icon
    const solidHeartIcon = button.querySelector('.fa-solid.fa-heart'); // Target the solid heart icon

    if (heartIcon.style.display === 'none') {
      heartIcon.style.display = 'inline-block'; // Show the line heart icon
      solidHeartIcon.style.display = 'none'; // Hide the solid heart icon
    } else {
      heartIcon.style.display = 'none'; // Hide the line heart icon
      solidHeartIcon.style.display = 'inline-block'; // Show the solid heart icon
      
    }
  });
});

const bookmarks = document.querySelectorAll('.bookmark');

bookmarks.forEach(bookmark => {
  bookmark.addEventListener('click', () => {
    const regularBookmarkIcon = bookmark.querySelector('.fa-regular.fa-bookmark');
    const solidBookmarkIcon = bookmark.querySelector('.fa-solid.fa-bookmark');

    if (regularBookmarkIcon.style.display === 'none') {
      regularBookmarkIcon.style.display = 'inline-block';
      solidBookmarkIcon.style.display = 'none';
    } else {
      regularBookmarkIcon.style.display = 'none';
      solidBookmarkIcon.style.display = 'inline-block';
    }
  });
});


</script>
<script src="https://kit.fontawesome.com/b795265882.js" crossorigin="anonymous"></script>

</body>

</html>