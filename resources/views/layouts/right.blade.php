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
        <!------- MESSAGES ------->
        <div class="messages">
            <div class="heading">
                <h4>SUGGESTED FOR YOU</h4>
                <i class="uil uil-edit"></i>
            </div>
            <!------- SEARCH BAR ------->

            <!-- <div class="search-bar">
                        <i class="uil uil-search"></i>
                        <input type="search" placeholder="Search messages" id="message-search">
                    </div> -->

            <!------- MESSAGES CATEGORY ------->


            @foreach ($suggestUsers as $suggestUser)
            <div class="message">
                <div class="profile-photo">
                    <img src="{{ $suggestUser->avatar }}">
                    <div class="active"></div>
                </div>
                <div class="message-body">
                    <h5>{{ $suggestUser->name }}</h5>
                    <p class="text-muted">Sparks Recommended LOL</p>
                </div>
            </div>
            @endforeach
        </div>
        <!------- END OF MESSAGES ------->

        <!------- FRIEND REQUEST ------->
        <div class="friend-requests">
            <h2>Follower</h2>

            @foreach($follbacks as $follback)
            <div class="request">
                <div class="info">
                    <div class="profile-photo">
                        <img src="{{ $follback->avatar }}">
                    </div>
                    <div>
                        <h5>{{ $follback->name }}</h5>
                    </div>
                </div>
                <div class="action">
                    <button class="btn btn-primary">
                        Follback
                    </button>
                </div>
            </div>
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