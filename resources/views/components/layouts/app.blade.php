<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-black">
        <div class="container d-flex justify-content-center mt-1">
            <a class="navbar-brand" href="{{ route('card-search') }}">
                <h3>Yu-Gi-Oh! Improved Card Text</h3>
            </a>
        </div>
    </nav>

    <main class="container mt-5">
        <div class="p-5 rounded-0">
            {{ $slot }}
        </div>
    </main>


    @livewireScripts
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
