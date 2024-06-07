<div id="commentModal-{{ $post->id }}" class="comment-modal" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <div class="poster-info">
                <img src="{{ asset($post->users->profile_picture) }}" alt="Profile Picture" class="profile-picture">
                <a href="{{ route('profile.show', $post->id_users) }}">
                    <b>{{ $post->users->username }}</b>
                </a>
            </div>
            <span class="close" onclick="closeCommentModal({{ $post->id }})">&times;</span>
        </div>

        <div class="comments-container">
            <div id="comments-list-{{ $post->id }}">
            @foreach ($post->commments as $comment)
                <div class="comment">
                    <div class="comment-info">
                        <img src="{{ $comment->users->profile_picture }}" alt="Profile Picture" class="profile-picture">
                    </div>
                    <div class="comment-content">
                    <p>
                        <a href="{{ route('profile.show', $post->id_users) }}">
                            <b>{{ $comment->users->username }}</b>
                        </a>
                        {{ $comment->comment }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="comment-input">
            <form class="commentForm" id="modalCommentForm-{{ $post->id }}" data-post-id="{{ $post->id }}">
                @csrf
                <div class="input-wrapper">
                    <input type="text" class="commentText" name="comment" placeholder="Add a comment...">
                    <button class="comments-button" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .comment-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden; /* Prevent scrolling of the entire modal */
        background-color: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(5px);
    }

    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border-radius: 12px;
        max-width: 600px;
        max-height: 80vh; /* Limit the height of the modal */
        overflow: hidden; /* Prevent scrolling of the entire modal */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .poster-info {
        display: flex;
        align-items: center;
    }

    .poster-username {
        margin-left: 10px;
        font-size: 16px;
        font-weight: bold;
    }

    .close {
        color: #aaa;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
    }

    .comments-container {
        flex: 1;
        overflow-y: auto; /* Enable vertical scrolling for comments */
    }

    .comment-input {
        margin-top: 20px;
    }

    .input-wrapper {
        display: flex;
    }

    .commentText {
        flex: 1;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 20px;
        margin-right: 10px;
    }

    .comments-button {
        padding: 8px 20px;
        background-color: #3897f0;
        border: none;
        color: #fff;
        border-radius: 20px;
        cursor: pointer;
        font-weight: bold;
    }

    .comments-button:hover {
        background-color: #2680c2;
    }

    .comment {
        display: flex;
        margin-bottom: 20px;
    }

    .comment-info {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }

    .profile-picture {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .comment-content {
        flex: 1;
    }

    .comment-content p {
        margin: 0;
        padding: 5px 0;
        font-size: 14px;
        line-height: 1.5;
    }
</style>
