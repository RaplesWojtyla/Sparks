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
    <nav>
        <div class="container">
            <h2 class="log">
                <a href="{{ route('dashboard') }}">Sparkling Water</a>
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
                    <img src="{{asset(Auth::user()->profile_picture)}}" alt="user's pp">
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

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </nav>
    
    <script>
        const searchInput = document.getElementById('searchInput');
        const searchResultsList = document.getElementById('searchResultList');
        const searchResultContainer = document.querySelector('.search-result');

        searchInput.addEventListener('input', () => {
            const searchQuery = searchInput.value.trim().toLowerCase();

            if (searchQuery.length > 0) {
                fetch(`/api/search?query=${searchQuery}`)
                    .then(response => response.json())
                    .then(data => {  
                        searchResultsList.innerHTML = '';
                        
                        if (data.results && data.results.length > 0) {
                            const resultList = data.results.map(result => `
                                <li>
                                    <img src="${result.profile_picture}" alt="${result.name} photo">
                                    <div>
                                        <a href="profile/${result.id_user}">
                                            <b class="result-name">${result.name}</b>
                                            <div class="result-details">${result.username}</div>
                                        </a>
                                    </div>
                                </li>
                            `).join('');
                            searchResultsList.innerHTML = resultList;
                            searchResultContainer.style.display = 'block';
                        } else {
                            searchResultsList.innerHTML = '<li>No results found.</li>';
                            searchResultContainer.style.display = 'block';
                        }
                    });
            } 
            else {
                fetch('/api/history')
                    .then(response => response.json())
                    .then(data => {
                        searchResultsList.innerHTML = '';

                        if (data.history && data.history.length > 0) {
                            const historyList = data.history.map(historyItem => `
                                <li>
                                    <img src="${historyItem.profile_picture}" alt="${historyItem.name} photo">
                                    <div>
                                        <a href="profile/${historyItem.id_user}">
                                            <b class="result-name">${historyItem.name}</b>
                                            <div class="result-details">${historyItem.username}</div>
                                        </a>
                                    </div>
                                </li>
                            `).join('');
                            searchResultsList.innerHTML += `<li><b>Search History</b></li>${historyList}`;
                            searchResultContainer.style.display = 'block';
                        } else {
                            searchResultContainer.style.display = 'none';
                        }
                    });
            }
        });

        document.addEventListener('click', (event) => {
            if (!searchResultContainer.contains(event.target) && !searchInput.contains(event.target)) {
                searchResultContainer.style.display = 'none';
            }
        });
    </script>
</body>

</html>