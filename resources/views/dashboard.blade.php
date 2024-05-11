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
</x-app-layout>
