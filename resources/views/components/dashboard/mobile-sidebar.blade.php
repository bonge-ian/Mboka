<aside class="uk-width-1-1 uk-panel uk-tile uk-tile-small uk-tile-muted uk-sticky uk-position-z-index uk-border-rounded uk-hidden@m uk-padding-small-vertical uk-flex-last"
       uk-sticky="position: bottom;end: true; animation: uk-animation-slide-bottom;start: .uk-grid">
    <ul class="uk-subnav uk-subnav-pill uk-child-width-expand"
        uk-margin>
        <li>
            <a href="{{ route('dashboard.index') }}"
               uk-icon="icon: home-icon"
               uk-tooltip="title: Home">
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.listings.index') }}"
               uk-icon="icon: briefcase"
               uk-tooltip="title: Manage listings">
            </a>
        </li>
        <li>
            <a href="{{ route('listing.create') }}"
               class="uk-text-secondary"
               uk-icon="icon: plus-circle;ratio: 1.2"
               uk-tooltip="title: New Listing">
            </a>
        </li>
        <li>
            <a href="#"
               uk-icon="icon: analyse"
               uk-tooltip="title: Analytics">
            </a>
        </li>
        <li>
            <a href="#"
               uk-icon="icon: wallet"
               uk-tooltip="title: Transactions">
            </a>
        </li>
    </ul>
</aside>
