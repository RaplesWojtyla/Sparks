                        <div class="notifications-popup">
                            @foreach ($notifications as $notification)
                            <div>
                                <div class="profile-photo">
                                    <img src="{{$notification->users->avatar}}">
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
                            @endforeach
                        </div>
                        <!--------------- END NOTIFICATION POPUP --------------->