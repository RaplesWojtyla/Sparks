
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Profile Page</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/urstyle.css') }}" />
  </head>
  <body>
    <div class="header__wrapper">
      <header></header>
      <div class="cols__container">
        <div class="left__col">
          <div class="img__container">
            <img src="img/user.jpeg" alt="Anna Smith" />
            <span></span>
          </div>
          <h2>username</h2>
          <p>nama</p>
          <p>email</p>

          <ul class="about">
            <li><span>4,073</span>Followers</li>
            <li><span>322</span>Following</li>
          </ul>

          <div class="content">
            <p>
              hello, i'm using Sparks Social Media!
            </p>
          </div>
        </div>
        <div class="right__col">
          <nav>
            <button>Follow</button>
          </nav>

          <div class="photos">
            <img src="" alt="Photo postingan" />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
