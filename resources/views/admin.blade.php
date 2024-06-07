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
    <div class="container">
            <h2 class="log">
                <a href="{{ route('dashboard') }}">Sparks</a>
            </h2>
            <!-- search bar -->
            <div class="search-container">
                <div class="search-bar">
                    <i class="uil uil-search"></i>
                    <input type="search" placeholder="search" id="searchInput">
                </div>
                <div class="search-result" id="searchResultContainer">
                    <ul id="searchResultList"></ul>
                </div>
            </div>

            <!-- Dropdown menu -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="profile-photo profile">
                    <img src="{{ asset(Auth::user()->profile_picture) }}" alt="user's pp">
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.show', Auth::user()->id)">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
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