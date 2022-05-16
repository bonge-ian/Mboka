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
    <script defer
            src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script defer
            src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
    <livewire:styles />
</head>

<body>
    <div id="app">
        <x-navbar />

        <main class="uk-background-muted uk-position-relative">
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

            <article class="uk-section uk-section-default"
                     id="dashboard">
                <div class="uk-container uk-container-expand">
                    <div class="uk-grid uk-child-width-1-1 uk-grid-medium"
                         uk-grid>
                        <div class="uk-width-1-5@m uk-visible@m">
                            <x-dashboard.sidebar />
                        </div>
                        <x-dashboard.mobile-sidebar />

                        <div class="uk-width-4-5@m uk-grid-item-match">
                            <div
                                 class="uk-panel uk-tile uk-tile-default uk-box-shadow-medium  uk-border-rounded uk-padding-large uk-padding-small-top dashboard-content">
                                <h1 class="uk-margin-small-top uk-text-bold">{{ $page_title ?? '' }}</h1>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>

            </article>


        </main>

    </div>

    <!-- App -->
    <script src="{{ mix('js/app.js') }}"></script>
    <livewire:scripts />
    @livewireChartsScripts
    <script>
        document.addEventListener("livewire:load", () => {
            window.livewire.hook("element.updated", (el, component) => {
                if (el.hasAttribute("uk-icon")) {
                    UIkit.icon(el, {
                        icon: el.getAttribute("uk-icon"),
                    });
                }

                if (el.hasAttribute("uk-spinner")) {
                    UIkit.spinner(el);
                }

                if (el.hasAttribute('uk-grid')) {
                    UIkit.update(el);
                }

                if (el.hasAttribute("uk-pagination-previous")) {
                    UIkit.icon(el, {
                        icon: el.getAttribute("uk-pagination-previous"),
                    });
                }

                if (el.hasAttribute("uk-pagination-next")) {
                    UIkit.icon(el, {
                        icon: el.getAttribute("uk-pagination-next"),
                    });
                }

                if (el.hasAttribute("uk-img")) {
                    UIkit.img(el, {
                        dataSrc: el.getAttribute("data-src"),
                    });
                }
            });

        });
    </script>
</body>

</html>
