<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>

    @include('partials.navbar')
    <div class="container mt-4">
        @include('partials.alert')
        @yield('content')
    </div>
    @include('partials.footer')
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
