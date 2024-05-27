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
    <!----------------- RIGHT -------------------->
    <div class="right">

        <!------- SEARCH BAR ------->
        <!--  <div class="search-bar">
                    <i class="uil uil-search"></i>
                    <input type="search" placeholder="Search messages" id="message-search">
            </div> -->

        <!------- SUGGESTED USER ------->
        <div class="friend-requests">
            <h2>Suggested For You</h2>
            @foreach ($suggestUsers as $suggestUser)
                <form action="{{ route('follow', $suggestUser) }}" method="post">
                @csrf
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="{{ asset($suggestUser->profile_picture) }}">
                            </div>
                            <div>
                                <a href="{{ route('profile.show', $suggestUser->id)}}">
                                    <h5>{{ $suggestUser->name }}</h5>
                                </a>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Follow
                            </button>
                        </div>
                    </div> 
                </form>
            @endforeach
        </div>
        <!------- END OF SUGGESTED USER ------->

        <!------- Follow Back User ------->
        <div class="friend-requests">
            <h2>Follower</h2>

            @foreach($follbacks as $follback)
            <form action="{{ route('follow', $follback) }}" method="post">
                @csrf
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="{{ asset($follback->profile_picture) }}">
                            </div>
                            <div>
                                <a href="{{ route('profile.show', $follback->id)}}">
                                    <h5>{{ $follback->name }}</h5>
                                </a>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Follow Back
                            </button>
                        </div>
                    </div> 
                </form>
            @endforeach


            <!-- <div class="request">
                <div class="info">
                    <div class="profile-photo">
                        <img src="./images/profile-18.jpg">
                    </div>
                    <div>
                        <h5>Edelson Mandela</h5>
                        <p class="text-muted">2 mutual friends</p>
                    </div>
                </div>
                <div class="action">
                    <button class="btn btn-primary">
                        Accept
                    </button>
                    <button class="btn">
                        Decline
                    </button>
                </div>
            </div> -->


            <!-- <div class="request">
                <div class="info">
                    <div class="profile-photo">
                        <img src="./images/profile-17.jpg">
                    </div>
                    <div>
                        <h5>Megan Baldwin</h5>
                        <p class="text-muted">5 mutual friends</p>
                    </div>
                </div>
                <div class="action">
                    <button class="btn btn-primary">
                        Accept
                    </button>
                    <button class="btn">
                        Decline
                    </button>
                </div>
            </div> -->
        </div>
    </div>
    <!----------------- END OF RIGHT -------------------->

</body>

</html>