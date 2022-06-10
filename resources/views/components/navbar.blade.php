<header class="uk-sticky uk-position-z-index-large"
        uk-sticky="sel-target: .uk-background-default; cls-active: uk-navbar-sticky;animation: uk-animation-slide-top;show-on-up: true">
    <div class="uk-background-default uk-box-shadow-small">
        <div class="uk-container uk-container-large">
            <nav class="uk-navbar"
                 role="main-navigation"
                 uk-navbar="align: left">
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo"
                       href="/"
                       uk-icon="icon: logo; ">

                    </a>


                </div>

                <div class="uk-navbar-center">
                    {{-- navigation links --}}
                    <ul class="uk-navbar-nav uk-visible@m">
                        <li class="{{ request()->is('/') ? 'uk-active' : '' }}">
                            <a href="/">Home</a>
                        </li>
                        @auth
                            <li class="{{ request()->routeIs('dashboard.index') ? 'uk-active' : '' }}">
                                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                        @endauth
                        <li class="{{ request()->routeIs('how-it-works') ? 'uk-active' : '' }}">
                            <a href="{{ route('how-it-works') }}">How it Works</a>
                        </li>
                        <li class="{{ request()->routeIs('about-us') ? 'uk-active' : '' }}">
                            <a href="{{ route('about-us') }}">About Us</a>
                        </li>
                        <li>
                            <a href="mailto:info@bonge-inc.co.ke">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="uk-navbar-right">
                    <div class="uk-navbar-item uk-hidden@m">
                        <a class="uk-navbar-toggle "
                           href="#mobile-nav"
                           uk-toggle="animation: true"
                           aria-expanded="false">
                            <div uk-navbar-toggle-icon=""
                                 class="uk-icon uk-navbar-toggle-icon">
                            </div>
                        </a>
                    </div>
                    <ul class="uk-navbar-nav uk-visible@m">
                        @guest
                            <li class="{{ request()->routeIs('login') ? 'uk-active' : '' }}">
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                        @else
                            <li>
                                <a href="#">
                                    <img src="{{ asset('storage/assets/img/dashboard-icon.svg') }}"
                                         alt="Homer Simpson Avatar"
                                         width="50"
                                         height="50"
                                         loading="lazy"
                                         class="uk-border-circle">
                                </a>
                                <div class="uk-navbar-dropdown uk-width-medium">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-nav-header">
                                            Hi, {{ Auth::user()->name }}
                                        </li>

                                        <li class="uk-nav-divider"></li>

                                        <li>
                                            <a href="/user/profile">
                                                <span uk-icon="icon: user;ratio: 1.2"
                                                      class="uk-margin-small-right"></span>
                                                Profile
                                            </a>
                                        </li>

                                        <li>
                                            <x-logout />
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <div class="uk-navbar-item uk-visible@m">
                        <a class="uk-button uk-button-primary uk-border-rounded"
                           href="{{ route('listing.create') }}">Create a Listing</a>
                    </div>
                </div>
            </nav>
        </div>

        <aside class="uk-position-relative uk-position-z-index">
            <div class="uk-position-top"
                 id="mobile-nav"
                 hidden>
                <div class="uk-background-default uk-box-shadow-small uk-padding">
                    <div class="uk-child-width-1-1 uk-grid uk-grid-stack"
                         uk-grid>
                        <div>
                            <nav class="uk-panel"
                                 role="main-mobile-navigation">
                                <ul class="uk-nav uk-nav-default uk-nav-divider uk-nav-parent-icon uk-nav-accordion"
                                    uk-nav="targets: > .js-accordion;">
                                    <li class="{{ request()->is('/') ? 'uk-active' : '' }}">
                                        <a href="/">Home</a>
                                    </li>
                                    @auth
                                        <li class="{{ request()->routeIs('dashboard.index') ? 'uk-active' : '' }}">
                                            <a href="{{ route('dashboard.index') }}">Dashboard</a>
                                        </li>
                                    @endauth
                                    <li class="{{ request()->routeIs('about-us') ? 'uk-active' : '' }}">
                                        <a href="{{ route('about-us') }}">About us</a>
                                    </li>
                                    <li class="{{ request()->routeIs('how-it-works') ? 'uk-active' : '' }}>
                                        <a href="{{ route('how-it-works') }}">How it works</a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@bonge-inc.co.ke">Contact</a>
                                    </li>
                                    @guest
                                        <li>
                                            <a href="{{ route('login') }}">Login</a>
                                        </li>
                                    @else
                                        <li class="uk-parent js-accordion">
                                            <a href="#"
                                               class="uk-flex uk-flex-middle">

                                                <img src="{{ asset('storage/assets/img/dashboard-icon.svg') }}"
                                                     alt="Homer Simpson Avatar"
                                                     width="50"
                                                     height="50"
                                                     loading="lazy"
                                                     class="uk-border-circle">
                                                <span>
                                                    Your settings
                                                </span>
                                            </a>
                                            <ul class="uk-nav-sub">
                                                <li class="uk-nav-header">
                                                    Hi, {{ Auth::user()->name }}
                                                </li>

                                                <li class="uk-nav-divider"></li>

                                                <li>
                                                    <a href="/user/profile">
                                                        <span uk-icon="user"
                                                              class="uk-margin-small-right"></span>
                                                        Profile
                                                    </a>
                                                </li>

                                                <li>
                                                    <x-logout />
                                                </li>

                                            </ul>
                                        </li>
                                    @endguest
                                </ul>

                            </nav>
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <footer class="uk-panel"
                                    aria-label="mobile-navigation-footer">
                                <div class="uk-panel">
                                    <div>
                                        <a class="uk-button uk-button-primary uk-button-large uk-border-rounded uk-width-1-1"
                                           href="{{ route('listing.create') }}">Create a Listing</a>
                                    </div>
                                    <hr>
                                    <p class="uk-text-meta uk-text-center">©
                                        <script>
                                            document.currentScript.insertAdjacentHTML(
                                                'afterend',
                                                '<time datetime="' + new Date().toJSON() + '">' + new Intl
                                                .DateTimeFormat(document.documentElement.lang, {
                                                    year: 'numeric'
                                                }).format() + '</time>');
                                        </script>
                                        <time datetime=""></time>
                                        <strong>Mboka</strong>. All rights reserved.
                                    </p>

                                    <div class="uk-child-width-auto uk-grid-small uk-flex uk-flex-center uk-grid"
                                         uk-grid>
                                           <div>
                                            <a class="uk-icon-link uk-icon"
                                               href="https://bonge-inc.co.ke"
                                               id="Bonge Inc website link"
                                               uk-icon="icon: world;">
                                            </a>
                                        </div>
                                        <div>
                                            <a class="uk-icon-link uk-icon"
                                               href="https://www.facebook.com/bonge.inc/"
                                               id="Bonge Inc Facebook Page"
                                               uk-icon="icon: facebook;">
                                            </a>
                                        </div>

                                        <div>
                                            <a class="uk-icon-link uk-icon"
                                               href="https://github.com/bonge-ian"
                                                id="Bonge's Github Page"
                                               uk-icon="icon: github;">
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>

</header>
