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
    <noscript>Sorry, your browser does not support JavaScript!</noscript>

    @yield('body')

    <div class="toast-container position-fixed top-0 end-0" id="toast-stack"></div>

    <script>
        window.translation = {!! $translation !!};
        window.translationJson = {!! $translationJson !!};
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

    @if (session('toast_primary'))
        <script>
            appendToast("{!! session('toast_primary') !!}", "primary");
        </script>
    @endif

    @if (session('toast_secondary'))
        <script>
            appendToast("{!! session('toast_secondary') !!}", "secondary");
        </script>
    @endif

    @if (session('toast_success'))
        <script>
            appendToast("{!! session('toast_success') !!}", "success");
        </script>
    @endif

    @if (session('toast_info'))
        <script>
            appendToast("{!! session('toast_info') !!}", "info");
        </script>
    @endif

    @if (session('toast_warning'))
        <script>
            appendToast("{!! session('toast_warning') !!}", "warning");
        </script>
    @endif

    @if (session('toast_error'))
        <script>
            appendToast("{!! session('toast_error') !!}", "error");
        </script>
    @endif

    @if (session('toast_light'))
        <script>
            appendToast("{!! session('toast_light') !!}", "light");
        </script>
    @endif

    @if (session('toast_dark'))
        <script>
            appendToast("{!! session('toast_dark') !!}", "dark");
        </script>
    @endif

    @stack('js')
</body>

</html>
