<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>@yield('title')</title>

    @stack('meta')

    @stack('css')
</head>

<body>
    @yield('body')

    @include('partials.toast')

    <script>
        window.translation = {!! $translation !!};
        window.translationJson = {!! $translationJson !!};
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('js')
</body>

</html>
