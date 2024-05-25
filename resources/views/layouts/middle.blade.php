<?php

use App\Models\Like;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
                            <h3>{{ $post->users->name }}</h3>
                            <small>{{Carbon::parse($post->created_at)->format('d-m-Y')}}</small>
                            {{-- DB::table('post')->select(DB::raw('TIMESTAMPDIFF(DAY, created_at, NOW()) as duration'))->get(); --}}
                        </div>
                    </div>
                    <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                    </span>
                </div>

                <div class="photo">
                    @if ($post->filePosts->first() != NULL)    
                        @foreach ($post->filePosts as $filepost)
                            <img src="{{ asset($filepost->berkas) }}">
                        @endforeach
                    @endif
                </div>

                <div class="action-buttons">
                    <div class="interaction-buttons">
                        <?php
                            $displayRegularHeart = 'block;';
                            $displaySolidHeart = 'none;';
                        ?>
                        @if ($post->likes->where('id_users', Auth::user()->id)->first() != NULL)
                        <?php
                            $displayRegularHeart = 'none;';
                            $displaySolidHeart = 'block;';
                        ?>
                        @endif
                        <button id="likeButton" class="like-button" data-post-id="{{ $post->id }}" data-likes-count-id="likes-count-{{$post->id}}">
                            <i class="fa-regular fa-heart" style="display: {{$displayRegularHeart}}"></i>
                            <i class="fa-solid fa-heart" style="color: red; display: {{$displaySolidHeart}}"></i>
                        </button>
                        <span><i class="uil uil-comment-dots"></i></span>
                    </div>
                    <div class="bookmark">
                        <?php
                            $displayRegularBookmark = 'inline-block;';
                            $displaySolidBookmark = 'none;';
                        ?>
                        @if ($post->bookmarks->where('id_users', Auth::user()->id)->first() != NULL)
                            <?php
                                $displayRegularBookmark = 'none;';
                                $displaySolidBookmark = 'inline-block;';
                            ?>
                        @endif

                        <button id="bookmark-button" data-bookmark-id="{{$post->id}}">
                            <i class="fa-regular fa-bookmark" style="display: {{$displayRegularBookmark}}"></i>
                            <i class="fa-solid fa-bookmark" style="display: {{$displaySolidBookmark}}"></i>
                        </button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Like Button -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '#likeButton', function() {
                const postId = $(this).data('post-id');
                const likesCountId = $(this).data('likes-count-id')
                const heartIcon = $(this).find('.fa-regular.fa-heart');
                const solidHeartIcon = $(this).find('.fa-solid.fa-heart');

                $.ajax({
                    url: '/post/' + postId + '/like',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#' + likesCountId).text(response.likesCount);

                        if (heartIcon.css('display') === 'none') 
                        {
                            heartIcon.css('display', 'inline-block'); // Show the line heart icon
                            solidHeartIcon.css('display', 'none'); // Hide the solid heart icon
                        } 
                        else 
                        {
                            heartIcon.css('display', 'none'); // Hide the line heart icon
                            solidHeartIcon.css('display', 'inline-block'); // Show the solid heart icon
                        }
                    }
                });
            });
        });
    </script>

    <!-- Bookmarks Button -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '#bookmark-button', function() {
                const bookmarkId = $(this).data('bookmark-id');
                const bookmarkIcon = $(this).find('.fa-regular.fa-bookmark')
                const solidBookmarkIcon = $(this).find('.fa-solid.fa-bookmark')

                $.ajax({
                    url: '/save-post/' + bookmarkId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        if (bookmarkIcon.css('display') === 'none')
                        {
                            bookmarkIcon.css('display', 'inline-block');
                            solidBookmarkIcon.css('display', 'none');
                        }
                        else
                        {
                            bookmarkIcon.css('display', 'none');
                            solidBookmarkIcon.css('display', 'inline-block');
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>