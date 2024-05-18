                        <div class="notifications-popup">
                            <?php $i = 0 ?>
                            @foreach ($notifications as $notification)
                                @if ($notification->posts->id_users == Auth::user()->id)
                                    <?php $i++ ?>
                                    <div>
                                        <div class="profile-photo">
                                            <img src="{{ asset($notification->users->profile_picture) }}">
                                        </div>
                                        <div class="notification-body">
                                            <b>{{$notification->users->name}}</b> 

                                            @if ($notification->id_post != NULL) 
                                                @if ($notification->tipe == 'like')
                                                    Liked your post
                                                @else
                                                    Commented in your post
                                                @endif
                                            @elseif ($notification->id_story != NULL)
                                                @if ($notification->tipe == 'like')
                                                    Liked your Story
                                                @else
                                                    Commented in your Story
                                                @endif
                                            @else
                                                Following You
                                            @endif
                                            <small class="text-muted">2 Days Ago</small>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($i == 0)
                                There No Notification
                            @endif
                        </div>
                        <!--------------- END NOTIFICATION POPUP --------------->