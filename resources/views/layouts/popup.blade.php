<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sparks Post Box</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="icon" href="{{ asset('icon/sparks.png') }}">
  <link rel="stylesheet" href="{{ asset('css/stylecreatetable.css') }}">
</head>

<body>
<div class="modal" id="CreatePostModal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <div class="wrapper">
            <section class="post">
                <header>Create Post</header>
                <form action="{{ route('post.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="content">
                        <img src="{{ asset(Auth::user()->profile_picture) }}" alt="user pp">
                        <div class="details">
                            <p>{{Auth::user()->name}}</p>
                        </div>
                    </div>
                    <textarea name="caption" placeholder="What's on your mind, Sparks?" spellcheck="false" required></textarea>
                    <div class="theme-emoji">
                        <img src="{{ asset('icon/smile.svg') }}" alt="smile">
                    </div>
                    <div class="input-box">
                        <label>Add to Your Post here</label>
                        <input name="file_post" type="file">
                    </div>
                    <button>Post</button>
                </form>
            </section>
            <section class="audience">
                <header>
                    <div class="arrow-back"><i class="fas fa-arrow-left"></i></div>
                    <p>Select Audience</p>
                </header>
                <div class="content">
                    <p>Who can see your post?</p>
                    <span>Your post will show up in News Feed, on your profile and in search results.</span>
                </div>
                <ul class="list">
                    <li>
                        <div class="column">
                            <div class="icon"><i class="fas fa-globe-asia"></i></div>
                            <div class="details">
                                <p>Public</p>
                                <span>Anyone on or off Sparks</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li class="active">
                        <div class="column">
                            <div class="icon"><i class="fas fa-user-friends"></i></div>
                            <div class="details">
                                <p>Friends</p>
                                <span>Your friends on Sparks</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                            <div class="icon"><i class="fas fa-user"></i></div>
                            <div class="details">
                                <p>Specific</p>
                                <span>Only show to some friends</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                            <div class="icon"><i class="fas fa-lock"></i></div>
                            <div class="details">
                                <p>Only me</p>
                                <span>Only you can see your post</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                            <div class="icon"><i class="fas fa-cog"></i></div>
                            <div class="details">
                                <p>Custom</p>
                                <span>Include and exclude friends</span>
                            </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      var modal = document.getElementById('CreatePostModal');
      var closeModal = document.getElementsByClassName('close-modal')[0];

      closeModal.onclick = function () {
        modal.style.display = 'none';
      }

      // Mencegah modal dari tertutup ketika mengklik di luar konten modal
      modal.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });

      // Mencegah penutupan ketika mengklik di dalam konten modal
      var modalContent = document.getElementsByClassName('modal-content')[0];
      modalContent.addEventListener('click', function(event) {
        event.stopPropagation();
      });
    });
  </script>
</body>


</html>