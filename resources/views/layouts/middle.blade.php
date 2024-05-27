<?php

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
            <div class="story" style="background-image: url('../images/sparks.png');">
                <span></span>
                <button class="add-story-btn" id="openStoryModalBtn">+</button>

                <p class="name">Add Your Story</p>
            </div>
            <div class="story" onclick="showStory(0)">
                <div class="profile-photo" style="background-image: url('./images/profile-8.jpg');">
                    <img src="{{ asset('images/sparks.jpg') }}" alt="">
                </div>
                <p class="name">Mixed media story</p>
            </div>
            <!-- Story Modal -->
            <div id="storyModal" class="modal">
                <div class="story-modal-content">
                    <div class="story-container">
                        <div class="story-content">
                            <img src="story1.jpg" alt="Story 1">
                        </div>
                        <div class="story-content">
                            <video src="story2.mp4" controls></video>
                        </div>
                    </div>
                    <div class="controls">
                        <button class="prev-btn">&lt;</button>
                        <button class="play-btn">&#9658;</button>
                        <button class="next-btn">&gt;</button>
                    </div>
                    <span class="close" onclick="closeStoryModal()">&times;</span>
                </div>
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
                            <a href="{{ route('profile.show', $post->id_users)}}">
                                <h3>{{ $post->users->name }}</h3>
                                <small>{{Carbon::parse($post->created_at)->format('d-m-Y')}}</small>
                            </a>
                            {{-- DB::table('post')->select(DB::raw('TIMESTAMPDIFF(DAY, created_at, NOW()) as duration'))->first()->duration --}}
                        </div>
                    </div>
                    <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                    </span>
                </div>

                <div class="photo">
                    @if ($post->filePosts->first() != NULL)
                        <img src="{{ asset($post->filePosts->first()->berkas) }}">
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
                    <p id="likes-count-{{$post->id}}">{{ $post->likes()->count() }}</p>
                </div>

                <div class="caption">
                    <p><b>{{ $post->users->username }}</b> {{ $post->caption }}
                    </p>
                </div>

                <div class="comments text-muted">
                    <span id="comments-count-{{$post->id}}">
                        @if ($post->commments()->count() == 0)
                            No Comment Yet
                        @elseif($post->commments()->count() == 1)
                            View {{ $post->commments()->count()}} comment
                        @elseif ($post->commments()->count() > 3)
                            View {{ $post->commments()->count() - 3 }} more comments
                        @else 
                            View {{ $post->commments()->count()}} comments
                        @endif
                    </span>
                </div>
                <!-- Input komentar -->
                <!-- Daftar komentar -->
                @if ($post->commments->sortByDesc('id')->groupBy('id_post')->first())
                    <?php $i = 1 ?>
                    @foreach ($post->commments->sortByDesc('id')->groupBy('id_post')->first() as $comment)
                        <div id="comments-{{$post->id}}" class="caption">
                            <p>
                                <a href="{{ route('profile.show', $comment->id_commenter)}}">
                                    <b>{{ $comment->users->username }}</b> 
                                </a>
                                {{ $comment->comment }}
                            </p>
                        </div>

                        @if ($i == 3)
                            @break
                        @endif
                        <?php $i++ ?>
                    @endforeach
                @endif

                <!-- Input komentar -->
                <div class="comment-input">
                    <form id="commentForm" data-post-id="{{$post->id}}" data-comment-id="comments-{{$post->id}}" data-comments-count-id="comments-count-{{$post->id}}">
                        @csrf
                        <div class="input-wrapper">
                            <input type="text" id="commentText" name="comment" placeholder="Add a comment...">
                            <button id="comments-button" type="submit">Send</button>
                        </div>
                    </form>
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

                        if (heartIcon.css('display') === 'none') {
                            heartIcon.css('display', 'inline-block'); // Show the line heart icon
                            solidHeartIcon.css('display', 'none'); // Hide the solid heart icon
                        } else {
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
                    url: '/post/' + bookmarkId + '/save',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        if (bookmarkIcon.css('display') === 'none') {
                            bookmarkIcon.css('display', 'inline-block');
                            solidBookmarkIcon.css('display', 'none');
                        } else {
                            bookmarkIcon.css('display', 'none');
                            solidBookmarkIcon.css('display', 'inline-block');
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('submit', '#commentForm', function(e) {
                e.preventDefault();

                const postId = $(this).data('post-id');
                const commentsPostId = $(this).data('comment-id')
                const commentsCounterId = $(this).data('comments-count-id');

                $.ajax({
                    url: '/post/' + postId + '/comment',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#' + commentsPostId).prepend('<p><b>' + response.username + '</b> ' + response.comment + '</p>')
                        if (response.commentsCount > 3)
                            $('#' + commentsCounterId).text('View more ' + (response.commentsCount - 3) + ' comments');
                        else if(response.commentsCount == 1) 
                            $('#' + commentsCounterId).text('View ' + response.commentsCount + ' comment');
                        else $('#' + commentsCounterId).text('View ' + (response.commentsCount) + ' comments');
                        $('input[name="comment"]').val('');
                    }
                });
            });
        });
    </script>
</body>

</html>