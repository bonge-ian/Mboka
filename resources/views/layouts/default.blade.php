<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    @isset($title)
        <title>{{ config('app.name', 'Laravel') }} - {{ $title }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endisset

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Khula:wght@400;700&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet"
          href="{{ mix('css/app.css') }}" />

</head>

<body>
    <div id="app">
        <x-navbar />

        <main class="uk-background-muted">

            @if (session('status'))
                <aside class="uk-container uk-container-small">
                    <div class="uk-margin-top">
                        <x-status-alert />
                    </div>
                </aside>
            @endif

            @if (session('error') || session('success'))
                <aside class="uk-container uk-container-small">
                    <div class="uk-margin-top">
                        <x-session-alert />
                    </div>
                </aside>
            @endif

            {{ $slot }}
        </main>
    </div>
    <x-footer />
    <!-- App -->
    <script src="{{ mix('js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
