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
            <!----------------- FEED 2 -------------------->
            @foreach ($posts as $post)
            <div class="feed">
                <div class="head">
                    <div class="user">
                        <div class="profile-photo">
                            <img src="./images/profile-10.jpg">
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
                        <button id="likeButton" data-post-id="{{ $post->id }}" data-likes-count-id="likes-count-{{$post->id}}">
                            <i class="uil uil-heart"></i>
                        </button>
                        <span><i class="uil uil-comment-dots"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>
                    </div>
                    <div class="bookmark">
                        <span><i class="uil uil-bookmark-full"></i></span>
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
            <!----------------- END OF FEED 2 -------------------->

            <!----------------- FEED 3 -------------------->
            <div class="feed">
                <div class="head">
                    <div class="user">
                        <div class="profile-photo">
                            <img src="./images/profile-4.jpg">
                        </div>
                        <div class="info">
                            <h3>Rosalinda Clark</h3>
                            <small>New York, 50 Minutes Ago</small>
                        </div>
                    </div>
                    <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                    </span>
                </div>

                <div class="photo">
                    <img src="./images/feed-4.jpg">
                </div>

                <div class="action-buttons">
                    <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment-dots"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>
                    </div>
                    <div class="bookmark">
                        <span><i class="uil uil-bookmark-full"></i></span>
                    </div>
                </div>

                <div class="liked-by">
                    <span><img src="./images/profile-12.jpg"></span>
                    <span><img src="./images/profile-13.jpg"></span>
                    <span><img src="./images/profile-14.jpg"></span>
                    <p>Liked by <b>Clara Dwayne</b> and <b>2, 323 others</b></p>
                </div>

                <div class="caption">
                    <p><b>Rosalinda Clark</b> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo ullam, quam voluptatibus natus ex corporis ea atque quisquam, necessitatibus, cumque eligendi aliquam nulla soluta hic. Obcaecati, tempore dignissimos! Esse cupiditate laborum ullam, quae necessitatibus, officiis, quaerat aspernatur illo voluptatum repellat perferendis voluptatem similique. Assumenda nostrum, eius sit laborum nesciunt deserunt!
                        <span class="harsh-tag">#lifestyle</span>
                    </p>
                </div>

                <div class="comments text-muted">
                    View all 50 comments
                </div>
            </div>
            <!----------------- END OF FEED 3 -------------------->

            <!----------------- FEED 4 -------------------->
            <div class="feed">
                <div class="head">
                    <div class="user">
                        <div class="profile-photo">
                            <img src="./images/profile-5.jpg">
                        </div>
                        <div class="info">
                            <h3>Alexandria Riana</h3>
                            <small>Dubai, 1 Hour Ago</small>
                        </div>
                    </div>
                    <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                    </span>
                </div>

                <div class="photo">
                    <img src="./images/feed-5.jpg">
                </div>

                <div class="action-buttons">
                    <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment-dots"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>
                    </div>
                    <div class="bookmark">
                        <span><i class="uil uil-bookmark-full"></i></span>
                    </div>
                </div>

                <div class="liked-by">
                    <span><img src="./images/profile-10.jpg"></span>
                    <span><img src="./images/profile-4.jpg"></span>
                    <span><img src="./images/profile-15.jpg"></span>
                    <p>Liked by <b>Lana Rose</b> and <b>5, 323 others</b></p>
                </div>

                <div class="caption">
                    <p><b>Alexandria Riana</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi architecto sunt itaque, in, enim non doloremque velit unde nihil vitae impedit dolorum, distinctio ab deleniti!
                        <span class="harsh-tag">#lifestyle</span>
                    </p>
                </div>

                <div class="comments text-muted">
                    View all 540 comments
                </div>
            </div>
            <!----------------- END OF FEED 4 -------------------->

            <!----------------- FEED 5 -------------------->
            <div class="feed">
                <div class="head">
                    <div class="user">
                        <div class="profile-photo">
                            <img src="./images/profile-7.jpg">
                        </div>
                        <div class="info">
                            <h3>Keylie Hadid</h3>
                            <small>Dubai, 3 Hours Ago</small>
                        </div>
                    </div>
                    <span class="edit">
                        <i class="uil uil-ellipsis-h"></i>
                    </span>
                </div>

                <div class="photo">
                    <img src="./images/feed-7.jpg">
                </div>

                <div class="action-buttons">
                    <div class="interaction-buttons">
                        <span><i class="uil uil-heart"></i></span>
                        <span><i class="uil uil-comment-dots"></i></span>
                        <span><i class="uil uil-share-alt"></i></span>
                    </div>
                    <div class="bookmark">
                        <span><i class="uil uil-bookmark-full"></i></span>
                    </div>
                </div>

                <div class="liked-by">
                    <span><img src="./images/profile-10.jpg"></span>
                    <span><img src="./images/profile-4.jpg"></span>
                    <span><img src="./images/profile-15.jpg"></span>
                    <p>Liked by <b>Riana Rose</b> and <b>1, 226 others</b></p>
                </div>

                <div class="caption">
                    <p><b>Keylie Hadid</b> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem obcaecati nisi veritatis quisquam eius accusantium rem quo repellat facilis neque.
                        <span class="harsh-tag">#lifestyle</span>
                    </p>
                </div>

                <div class="comments text-muted">
                    View all 199 comments
                </div>
            </div>
            <!----------------- END OF FEED 5 -------------------->
        </div>
        <!----------------- END OF FEEDS -------------------->
    </div>
    <!----------------- END OF MIDDLE -------------------->
</body>

</html>