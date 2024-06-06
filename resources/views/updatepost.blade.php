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
                        <small>{{ Carbon::parse($post->created_at)->format('d-m-Y') }}</small>
                        
                    </div>
                    <div class="photo">
                        @if ($post->filePosts->first() != null)
                        <img src="{{ asset($post->filePosts->first()->berkas) }}">
                        @endif
                    </div>
                    <!-- Input for updating caption (initially hidden) -->
                    <div class="update-caption" style="display: none;">
                        <input type="text" id="new-caption-{{ $post->id }}" value="{{ $post->caption }}">
                        <!-- Save Change button (initially hidden) -->
                    </div>
                    <button class="save-change-btn" onclick="saveChange(this)" style="display: none;">Save Change</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>