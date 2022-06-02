<aside class="uk-panel uk-tile uk-tile-small uk-tile-muted dashboard-menu uk-sticky uk-position-z-index uk-border-rounded uk-visible@m"
       uk-sticky="end: true; offset: 80">
    <div class="uk-width-1-1">
        <ul class="uk-nav-default uk-nav-parent-icon"
            uk-nav
            uk-margin>
            <li class="{{ request()->routeIs('dashboard.index') ? 'uk-active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <span class="uk-icon uk-margin-small-right"
                          uk-icon="icon: home-icon"></span>
                    Dashboard
                </a>
            </li>
            <li class="uk-nav-divider"></li>
            <li class="uk-nav-header">Manage Listings</li>
            <li class="{{ request()->routeIs('dashboard.listings.index') ? 'uk-active' : '' }}">
                <a href="{{ route('dashboard.listings.index') }}">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: briefcase"></span>
                    Listings
                </a>
            </li>
            <li class="{{ request()->routeIs('listing.create') ? 'uk-active' : '' }}">
                <a href="{{ route('listing.create') }}">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: plus-circle;ratio: 1.2"></span>
                    Create new listing
                </a>
            </li>
            <li class="{{ request()->routeIs('dashboard.analytics') ? 'uk-active' : '' }}">
                <a href="{{ route('dashboard.analytics') }}">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: analyse"></span>
                    Analytics
                </a>
            </li>
            <li class="{{ request()->routeIs('dashboard.transactions') ? 'uk-active' : '' }}">
                <a href="{{ route("dashboard.transactions") }}">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: wallet"></span>
                    Transactions
                </a>
            </li>
            <li class="uk-nav-divider"></li>
            <li class="uk-nav-header">Your Settings</li>
            <li class="{{ request()->is('/user/profile') ? 'uk-active' : '' }}">
                <a href="/user/profile">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: cog;ratio: 1.2"></span>
                    Profile Settings
                </a>
            </li>
            <li class="{{ request()->routeIs('logout') ? 'uk-active' : '' }}">
                <x-logout />
            </li>
        </ul>
    </div>
</aside>
