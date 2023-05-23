<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ReadIT') }}</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.svg') }}">
    @vite('resources/css/app.css')
    @livewireStyles
    {{--    <link rel="stylesheet" href="{{ asset('build/assets/app-ba27b785.css') }}">--}}
    {{--    <script src="{{ asset('build/assets/app-032e7394.js') }}"></script>--}}
</head>
<body>

@if(!Route::is('login') && !Route::is('register'))
    <div class="bg-[#F9F9F9]">
        <div class="w-[1300px] mx-auto">
            <x-header/>
            @endif

            <main>
                @yield('content')
            </main>

            @if(!Route::is('login') && !Route::is('register'))
                <x-footer/>
        </div>
    </div>
@endif

@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

</body>
</html>
