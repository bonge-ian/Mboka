<aside class="uk-panel uk-tile uk-tile-small uk-tile-muted dashboard-menu uk-sticky uk-position-z-index uk-border-rounded uk-visible@m"
       uk-sticky="end: true; offset: 80">
    <div class="uk-width-1-1">
        <ul class="uk-nav-default uk-nav-parent-icon"
            uk-nav
            uk-margin>
            <li>
                <a href="{{ route('dashboard.index') }}">
                    <span class="uk-icon uk-margin-small-right"
                          uk-icon="icon: home-icon"></span>
                    Dashboard
                </a>
            </li>
            <li class="uk-nav-divider"></li>
            <li class="uk-nav-header">Manage Listings</li>
            <li>
                <a href="#">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: briefcase"></span>
                    Listings
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: plus-circle;ratio: 1.2"></span>
                    Create new listing
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: analyse"></span>
                    Analytics
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: wallet"></span>
                    Transactions
                </a>
            </li>
            <li class="uk-nav-divider"></li>
            <li class="uk-nav-header">Your Settings</li>
            <li>
                <a href="/user/profile">
                    <span class="uk-margin-small-right"
                          uk-icon="icon: cog;ratio: 1.2"></span>
                    Profile Settings
                </a>
            </li>
            <li>
                <x-logout />
            </li>
        </ul>
    </div>
</aside>
