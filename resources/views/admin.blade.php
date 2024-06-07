<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'laravel') }}</title>
    <!-- iconscout cdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <nav>
        @include('layout.navbar')
    </nav>

    <!-------------------------------- MAIN ----------------------------------->
    <main>
        <div class="container">
            <!----------------- LEFT -------------------->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="{{ asset(Auth::user()->profile_picture) }}">
                    </div>
                    <div class="handle">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-muted">
                            {{ '@' . Auth::user()->username }}
                        </p>
                    </div>
                </a>

                <!----------------- SIDEBAR -------------------->
                <div class="sidebar">
                    <a class="menu-item active">
                        <span><i class="uil uil-home"></i></span>
                        <h3>User</h3>
                    </a>
                    <a class="menu-item" id="explore-menu">
                        <span><i class="uil uil-compass"></i></span>
                        <h3>Report</h3>
                    </a>
                </div>
                <!----------------- END OF SIDEBAR -------------------->
                <label class="btn btn-primary" for="create-post">Log Out</label>
            </div>

            <!----------------- MIDDLE -------------------->
            <div class="middle">
                <div class="user">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{$mhs->id_mahasiswa}}</th>
                                    <td>{{$mhs->nama}}</td>
                                    <td>{{$mhs->nim}}</td>
                                    <td>{{$mhs->alamat}}</td>
                                    <td>
                                        <a href="{{route('delete',$mhs->id_mahasiswa)}}">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="report">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Report</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{$mhs->id_mahasiswa}}</th>
                                    <td>{{$mhs->nama}}</td>
                                    <td>{{$mhs->nim}}</td>
                                    <td>{{$mhs->jurusan}}</td>
                                    <td>{{$mhs->alamat}}</td>
                                    <td>
                                        <a href="{{route('delete',$mhs->id_mahasiswa)}}">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!----------------- END OF MIDDLE -------------------->
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuItems = document.querySelectorAll(".menu-item");
            const exploreButton = document.querySelector("#explore-menu");
            const homeButton = document.querySelector(".menu-item.active"); // Assuming the first item is Home
            const reportDiv = document.querySelector(".report");
            const userDiv = document.querySelector(".user");

            // Function to handle the active class toggle
            function setActiveClass(event) {
                menuItems.forEach(item => {
                    item.classList.remove("active");
                });
                event.currentTarget.classList.add("active");
            }

            // Add click event listener to each menu item
            menuItems.forEach(item => {
                item.addEventListener("click", setActiveClass);
            });

            // Specific logic for the Explore button
            exploreButton.addEventListener("click", function() {
                console.log("Explore button clicked"); // Debugging log
                // Sembunyikan div user
                userDiv.style.display = "none";
                // Tampilkan div report
                reportDiv.style.display = "block";
            });

            // Specific logic for the Home button
            homeButton.addEventListener("click", function() {
                console.log("Home button clicked"); // Debugging log
                // Sembunyikan div report
                reportDiv.style.display = "none";
                // Tampilkan div user
                userDiv.style.display = "block";
            });

            // Inisialisasi: sembunyikan div report
            reportDiv.style.display = "none";
        });
    </script>
</body>

</html>