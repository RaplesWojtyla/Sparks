<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Our Team Section</title>
    <link rel="icon" href="{{ asset('icon/sparksicon.png') }}" type="x-icon">
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
                        <img src="{{ asset('images/pikun.jpg') }}" />
                    </div>
                    <h3>Alfi Syahrin</h3>
                    <p>Database Administrator</p>
                    <div class="icons">
                        <a href="https://www.instagram.com/a.syhrnn_21/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/alfi-syahrin-320866310/." target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/GoatMudryk" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="mailto:alfisyahrin2421@gmail.com" target="_blank">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column 2-->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="{{ asset('images/nauchan.jpg') }}" />
                    </div>
                    <h3>Naurah Alya Rahmah</h3>
                    <p>Frontend</p>
                    <div class="icons">
                        <a href="https://www.instagram.com/naurahlya/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/naurah-rahmah-4061082ba/" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/nauchann" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="mailto:naurahalyarahmah05@gmail.com" target="_blank">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column 3-->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="{{ asset('images/unknown.jpg') }}" />
                    </div>
                    <h3>Patra Rafles Wostyla Sinaga</h3>
                    <p>Backend</p>
                    <div class="icons">
                        <a href="https://www.instagram.com/raples.wojtyla/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/wojtyla-karma/" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/RaplesWojtyla" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="mailto:patrarwsinaga04@gmail.com" target="_blank">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- column 4 -->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="{{ asset('images/jojo.jpg') }}" />
                    </div>
                    <h3>Jonathan C Amadeo Sembiring</h3>
                    <p>Frontend</p>
                    <div class="icons">
                        <a href="https://www.instagram.com/jonathan_christian17/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/jonathan-c-amadeo-sembiring-227bb028a" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/JonathanChristian17" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="mailto:jonathanamadeo17@gmail.com" target="_blank">
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
