<x-app-layout>
    <x-slot name="title">
        Sparkling Water
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <main>
        <div class="container">
            <div class="left">
                @include('layouts.left')
            </div>
            <div class="middle">
                @include('layouts.middle')
            </div>
            <div class="right">
                @include('layouts.right')
            </div>
        </div>
        @include('layouts.theme')
    </main>

    <script src="{{ asset('js/index.js') }}"></script>
    <script src="https://kit.fontawesome.com/b795265882.js" crossorigin="anonymous"></script>

    <script>
        // const likeButtons = document.querySelectorAll('.like-button');

        // likeButtons.forEach(button => {
        //     button.addEventListener('click', () => {
        //         const heartIcon = button.querySelector('.fa-regular.fa-heart'); // Target the line heart icon
        //         const solidHeartIcon = button.querySelector('.fa-solid.fa-heart'); // Target the solid heart icon

        //         if (heartIcon.style.display === 'none') {
        //             heartIcon.style.display = 'inline-block'; // Show the line heart icon
        //             solidHeartIcon.style.display = 'none'; // Hide the solid heart icon
        //         } else {
        //             heartIcon.style.display = 'none'; // Hide the line heart icon
        //             solidHeartIcon.style.display = 'inline-block'; // Show the solid heart icon
        //         }
        //     });
        // });
    </script>

    <script>
        const bookmarks = document.querySelectorAll('.bookmark');

        bookmarks.forEach(bookmark => {
            bookmark.addEventListener('click', () => {
                const regularBookmarkIcon = bookmark.querySelector('.fa-regular.fa-bookmark');
                const solidBookmarkIcon = bookmark.querySelector('.fa-solid.fa-bookmark');

                if (regularBookmarkIcon.style.display === 'none') {
                    regularBookmarkIcon.style.display = 'inline-block';
                    solidBookmarkIcon.style.display = 'none';
                } else {
                    regularBookmarkIcon.style.display = 'none';
                    solidBookmarkIcon.style.display = 'inline-block';
                }
            });
        });
    </script>
</x-app-layout>