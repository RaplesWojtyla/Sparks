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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '#likeButton', function() {
            var postId = $(this).data('post-id');
            var likesCountId = $(this).data('likes-count-id')

            $.ajax({
                url: '/post/' + postId + '/like',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#' + likesCountId).text(response.likesCount);
                }
            });
        })
    </script>
</x-app-layout>