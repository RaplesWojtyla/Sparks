<?php

use Illuminate\Support\Carbon;

?>
<div class="notifications-popup">
    <?php $i = 0; ?>
    @foreach ($notifications as $notification)
        @if (
            $notification->id_post != null &&
                $notification->posts->id_users == Auth::user()->id &&
                $notification->id_users != Auth::user()->id)
            <?php $i++; ?>
            <div>
                <div class="profile-photo">
                    <img src="{{ asset($notification->users->profile_picture) }}">
                </div>
                <div class="notification-body">
                    <b>{{ $notification->users->name }}</b>
                    @if ($notification->tipe == 'like')
                        Liked your post
                    @else
                        Commented in your post
                    @endif
                    <small class="text-muted">{{ Carbon::parse($notification->created_at)->format('d-m-Y') }}</small>
                </div>
            </div>
        @elseif (
            $notification->stories != null &&
                $notification->stories->id_users == Auth::user()->id &&
                $notification->id_users != Auth::user()->id)
            <?php $i++; ?>
            <div>
                <div class="profile-photo">
                    <img src="{{ asset($notification->users->profile_picture) }}">
                </div>
                <div class="notification-body">
                    <b>{{ $notification->users->name }}</b>
                    @if ($notification->tipe == 'like')
                        Liked your Story
                    @else
                        Commented in your Story
                    @endif
                    <small class="text-muted">{{ Carbon::parse($notification->created_at)->format('d-m-Y') }}</small>
                </div>
            </div>
        @elseif (
            $notification->following != null &&
                $notification->following->id == Auth::user()->id &&
                $notification->id_users != Auth::user()->id)
            <?php $i++; ?>
            <div>
                <div class="profile-photo">
                    <img src="{{ asset($notification->users->profile_picture) }}">
                </div>
                <div class="notification-body">
                    <b>{{ $notification->users->name }}</b>
                    @if ($notification->tipe == 'follow')
                        Following You
                    @endif
                    <small class="text-muted">{{ Carbon::parse($notification->created_at)->format('d-m-Y') }}</small>
                </div>
            </div>
        @endif
        @if ($i == 6)
        @break
    @endif
@endforeach
@if ($i == 0)
    There No Notification
@endif
</div>
<!--------------- END NOTIFICATION POPUP --------------->
