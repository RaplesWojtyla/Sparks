<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Our Team Section</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}" />
</head>

<body>
    <section>
        <div class="row">
            <h1>Our Team</h1>
        </div>
        <div class="row">
            <!-- Column 1-->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="profile-img-1.png" />
                    </div>
                    <h3>Alfi Syahrin</h3>
                    <p>Database Administrator</p>
                    <div class="icons">
                        <a href="https://www.instagram.com/a.syhrnn_21/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/GoatMudryk">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column 2-->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="profile-img-2.png" />
                    </div>
                    <h3>Naurah Alya Rahmah</h3>
                    <p>Frontend</p>
                    <div class="icons">
                        <a href="https://www.instagram.com/naurahlya/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/naurah-rahmah-4061082ba/">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/nauchann">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="mailto:naurahalyarahmah05@gmail.com">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column 3-->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="profile-img-3.png" />
                    </div>
                    <h3>Patra Rafles Wostyla Sinaga</h3>
                    <p>Backend</p>
                    <div class="icons">
                        <a href="https://www.instagram.com/raples.wojtyla/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/RaplesWojtyla">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- column 4 -->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="profile-img-1.png" />
                    </div>
                    <h3>Jonathan C Amadeo Sembiring</h3>
                    <p>Frontend</p>
                    <div class="icons">
                        <a href="https://www.instagram.com/jonathan_christian17/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/JonathanChristian17">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-container">
        <a href="{{ route('dashboard') }}" class="btn">Sparks</a>
        </div>
    </section>
</body>

</html>