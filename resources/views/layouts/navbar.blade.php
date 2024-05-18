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
                <b>Sparkling Water</b>
            </h2>
            <!-- search bar -->
            <div class="search-container">
                <div class="search-bar">
                    <i class="uil uil-search"></i>
                    <input type="search" placeholder="search" id="searchInput">
                    <input type="button" value="search" class="btn btn-primary" id="searchButton">
                </div>
                <div class="search-result">
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
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
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
        const searchButton = document.getElementById('searchButton');
        const searchResultsList = document.getElementById('searchResultList');
        const searchResultContainer = document.querySelector('.search-result');

        // Assume you have a search function that takes a query and returns results (replace with your actual implementation)
        function search(query) {
            // Implement logic to fetch or filter search results based on the query
            // This could involve making an API call to a backend or manipulating existing data

            const results = [{
                    name: "Item 1",
                    photo: "https://example.com/photo1.jpg"
                },
                {
                    name: "Item 2",
                    photo: "https://example.com/photo2.jpg"
                },
                {
                    name: "naurah",
                    photo: "https://example.com/photo3.jpg"
                },
                // ... more results
            ];

            return results;
        }

        searchButton.addEventListener('click', () => {
            const searchQuery = searchInput.value.trim().toLowerCase();

            // Clear previous results
            searchResultsList.innerHTML = '';

            // Fetch or filter results
            const results = search(searchQuery);

            if (results.length > 0) {
                // Display results
                const resultList = results.map(result => `
            <li>
                <img src="${result.photo}" alt="${result.name} photo">
                <span class="result-name">${result.name}</span>
            </li>
        `).join('');
                searchResultsList.innerHTML = resultList;
                searchResultContainer.style.display = 'block';
            } else {
                // Display "No results found" message
                searchResultsList.innerHTML = '<li>No results found.</li>';
                searchResultContainer.style.display = 'block';
            }
        });

        // Hide search results when clicking outside
        document.addEventListener('click', (event) => {
            if (!searchResultContainer.contains(event.target) && !searchButton.contains(event.target) && !searchInput.contains(event.target)) {
                searchResultContainer.style.display = 'none';
            }
        });
    </script>
</body>

</html>