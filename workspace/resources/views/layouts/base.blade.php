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
    {{-- No Script --}}
    <noscript>Sorry, your browser does not support JavaScript!</noscript>

    {{-- Application Body --}}
    <div id="app">
        @yield('body')
    </div>

    {{-- Toast Container --}}
    <div class="toast-container position-fixed top-0 end-0" id="toast-stack"></div>

    {{-- Confirm Container --}}
    <div class="modal fade" id="static-backdrop">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-body p-4 text-center">
                    <h5 class="custom-modal-title mb-0"></h5>
                    <p class="custom-modal-message mb-0"></p>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button"
                        class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end accept">
                        <strong>{{ __('message.accept') }}</strong>
                    </button>
                    <button type="button"
                        class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 deny"
                        data-bs-dismiss="modal">
                        {{ __('message.deny') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Spinner Loading Container --}}
    <div class="spinner-loading" style="display: none">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    {{-- Transparent Modal --}}
    <div class="transparent-modal" style="display: none"></div>

    {{-- Translation Configs --}}
    <script>
        window.translation = {!! $translation !!};
        window.translationJson = {!! $translationJson !!};
    </script>

    {{-- Webpack compile JS ES6 --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Open Toast From Controller --}}
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

    {{-- JS Stacks --}}
    @stack('js')

    <script>
        openConfirmDialog({
            message: "You can always change your mind in your account settings.",
            title: "Enable this setting?"
        });
    </script>
</body>

</html>
