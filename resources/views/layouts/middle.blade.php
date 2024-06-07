<?php
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'laravel') }}</title>
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
                                <a href="{{ route('profile.show', $post->id_users) }}">
                                    <h3>{{ $post->users->name }}</h3>
                                    <small>{{ Carbon::parse($post->created_at)->format('d-m-Y') }}</small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="photo">
                        @if ($post->filePosts->first() != null)
                            <img src="{{ asset($post->filePosts->first()->berkas) }}">
                        @endif
                    </div>

                    <div class="action-buttons">
                        <div class="interaction-buttons">
                            <?php
                            $displayRegularHeart = 'block;';
                            $displaySolidHeart = 'none;';
                            ?>

                            @if ($post->likes->where('id_users', Auth::user()->id)->first() != null)
                                <?php
                                $displayRegularHeart = 'none;';
                                $displaySolidHeart = 'block;';
                                ?>
                            @endif

                            <button id="likeButton" class="like-button" data-post-id="{{ $post->id }}"
                                data-likes-count-id="likes-count-{{ $post->id }}">
                                <i class="fa-regular fa-heart" style="display: {{ $displayRegularHeart }}"></i>
                                <i class="fa-solid fa-heart" style="color: red; display: {{ $displaySolidHeart }}"></i>
                            </button>
                            <span><i class="uil uil-comment-dots"
                                    onclick="showCommentModal({{ $post->id }})"></i></span>
                        </div>
                        <div class="bookmark">
                            <?php
                            $displayRegularBookmark = 'inline-block;';
                            $displaySolidBookmark = 'none;';
                            ?>

                            @if ($post->bookmarks->where('id_users', Auth::user()->id)->first() != null)
                                <?php
                                $displayRegularBookmark = 'none;';
                                $displaySolidBookmark = 'inline-block;';
                                ?>
                            @endif

                            <button id="bookmark-button" data-bookmark-id="{{ $post->id }}">
                                <i class="fa-regular fa-bookmark" style="display: {{ $displayRegularBookmark }}"></i>
                                <i class="fa-solid fa-bookmark" style="display: {{ $displaySolidBookmark }}"></i>
                            </button>
                        </div>
                    </div>

                    <div class="liked-by">
                        <p id="likes-count-{{ $post->id }}">{{ $post->likes()->count() }}</p>
                    </div>

                    <div class="caption">
                        <p><b>{{ $post->users->username }}</b> {{ $post->caption }}</p>
                    </div>

                    <div class="comments text-muted" onclick="showCommentModal({{ $post->id }})"
                        style="cursor: pointer;">
                        <span id="comments-count-{{ $post->id }}">
                            @if ($post->commments()->count() == 0)
                                No Comment Yet
                            @elseif($post->commments()->count() == 1)
                                View {{ $post->commments()->count() }} comment
                            @elseif ($post->commments()->count() > 3)
                                View {{ $post->commments()->count() - 3 }} more comments
                            @else
                                View {{ $post->commments()->count() }} comments
                            @endif
                        </span>
                    </div>

                    <!-- Daftar komentar -->
                    <div id="comments-{{ $post->id }}">
                        @if ($post->commments->sortByDesc('id')->groupBy('id_post')->first())
                            <?php $i = 1; ?>
                            @foreach ($post->commments->sortByDesc('id')->groupBy('id_post')->first() as $comment)
                                <div class="caption">
                                    <p>
                                        <a href="{{ route('profile.show', $comment->id_commenter) }}">
                                            <b>{{ $comment->users->username }}</b>
                                        </a>
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                                @if ($i == 3)
                                @break
                            @endif
                            <?php $i++; ?>
                        @endforeach
                    @endif
                </div>

                <!-- Input komentar -->
                <div class="comment-input">
                    <form id="commentForm" data-post-id="{{ $post->id }}"
                        data-comment-id="comments-{{ $post->id }}"
                        data-comments-count-id="comments-count-{{ $post->id }}">
                        @csrf
                        <div class="input-wrapper">
                            <input type="text" id="commentText" name="comment" placeholder="Add a comment...">
                            <button id="comments-button" type="submit">Send</button>
                        </div>
                    </form>
                </div>

                <!-- Include Modal Pop-up Komentar -->
                @include('components.comment-modal', ['post' => $post])
            </div>
        @endforeach
    </div>
    <!----------------- END OF FEEDS -------------------->
</div>
<!----------------- END OF MIDDLE -------------------->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Like Ajax -->
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

<!-- Bookmarks Ajax -->
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


<!-- Send Comment Ajax (Main Page) -->
<script>
    $(document).ready(function() {
        $(document).on('submit', '#commentForm', function(e) {
            e.preventDefault();

            const postId = $(this).data('post-id');
            const commentsPostId = $(this).data('comment-id');
            const modalCommentListId = '#comments-list-' + postId;
            const commentsCounterId = $(this).data('comments-count-id');

            $.ajax({
                url: '/post/' + postId + '/comment',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#' + commentsPostId).prepend('<p><b>' + response.username + '</b> ' +
                        response.comment + '</p>');
                    $(modalCommentListId).prepend(
                    '<div class="comment">' +
                        '<div class="comment-info">' +
                            '<img src="' + response.profile_picture +
                            '" alt="Profile Picture" class="profile-picture">' +
                        '</div>' +
                        '<div class="comment-content">' +
                            '<p><b>' + response.username + '</b> ' + response.comment + '</p>' +
                        '</div>' +
                    '</div>'
                    );

                    if (response.commentsCount > 1)
                        $('#' + commentsCounterId).text('View ' + response.commentsCount +
                            ' comments');
                    else
                        $('#' + commentsCounterId).text('View ' + response.commentsCount +
                            ' comment');

                    $('input[name="comment"]').val('');
                }
            });
        });

        // // Comment submission for modal
        // $(document).on('submit', '.commentForm', function(e) {
        //     e.preventDefault();

        //     const postId = $(this).data('post-id');
        //     const modalCommentListId = '#comments-list-' + postId;
        //     const commentsPostId = $(this).data('comment-id');
        //     const commentsCounterId = '#comments-count-' + postId;

        //     $.ajax({
        //         url: '/post/' + postId + '/comment',
        //         type: 'POST',
        //         data: $(this).serialize(),
        //         success: function(response) {
        //             $(modalCommentListId).prepend(
        //                 '<div class="comment">' +
        //                     '<div class="comment-info">' +
        //                         '<img src="' + response.profile_picture +
        //                         '" alt="Profile Picture" class="profile-picture">' +
        //                     '</div>' +
        //                     '<div class="comment-content">' +
        //                         '<p><b>' + response.username + '</b> ' + response.comment + '</p>' +
        //                     '</div>' +
        //                 '</div>'
        //             );
        //             $('#' + commentsPostId).prepend('<p><b>' + response.username + '</b> ' +
        //                 response.comment + '</p>');

        //             if (response.commentsCount > 1)
        //                 $(commentsCounterId).text('View ' + response.commentsCount +
        //                     ' comments');
        //             else
        //                 $(commentsCounterId).text('View ' + response.commentsCount +
        //                     ' comment');

        //             $(this).find('input[name="comment"]').val('');
        //         }.bind(this) // Ensure `this` refers to the form element
        //     });
        // });
    });
</script>

<!-- JavaScript for Modal Pop-up -->
<script>
    function showCommentModal(postId) {
        document.getElementById('commentModal-' + postId).style.display = 'block';
    }

    function closeCommentModal(postId) {
        document.getElementById('commentModal-' + postId).style.display = 'none';
    }
</script>


</body>

</html>
