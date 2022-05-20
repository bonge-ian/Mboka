<div class="uk-width-1-1">

    <div class="uk-grid uk-grid-medium uk-child-width-1-1"
         id="manage-listings"
         uk-grid>
        <div class="uk-flex-last@m uk-flex-first uk-width-1-4@m">
            <aside class="uk-panel uk-visible@m uk-tile uk-tile-secondary uk-border-rounded uk-sticky uk-first-column"
                   uk-sticky="end: #manage-listings; offset: 80">
                <ul class="uk-nav-default uk-nav-parent-icon uk-nav uk-margin"
                    uk-nav
                    uk-margin>
                    <li class="{{ is_null($status) ? 'uk-active' : '' }}">
                        <a wire:click="$set('status', null)">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: briefcase-alt"></span>
                            All Listings
                        </a>
                    </li>
                    <li
                        class="{{ $status === App\Domain\States\ListingStatusEnum::ACTIVE->value ? 'uk-active' : '' }}">
                        <a wire:click="$set('status', '{{ App\Domain\States\ListingStatusEnum::ACTIVE->value }}')">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: check;ratio: 1.2"></span>
                            Active Listings
                        </a>
                    </li>
                    <li
                        class="{{ $status === App\Domain\States\ListingStatusEnum::PENDING->value ? 'uk-active' : '' }}">
                        <a wire:click="$set('status', '{{ App\Domain\States\ListingStatusEnum::PENDING->value }}')">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: hourglass;"></span>
                            Pending Listings
                        </a>
                    </li>
                    <li
                        class="{{ $status === App\Domain\States\ListingStatusEnum::CLOSED->value ? 'uk-active' : '' }}">
                        <a wire:click="$set('status', '{{ App\Domain\States\ListingStatusEnum::CLOSED->value }}')">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: close;ratio: 1.2"></span>
                            Closed Listings
                        </a>
                    </li>
                </ul>
            </aside>

            <aside class="uk-position-relative uk-panel uk-hidden@m uk-first-column uk-slider"
                   tabindex="-1"
                   uk-slider="draggable: true">

                <div class="uk-slider-container uk-margin">
                    <ul class="uk-slider-items uk-grid uk-child-width-auto uk-grid-small">
                        <li class="{{ is_null($status) ? 'uk-active' : '' }}"
                            tabindex="-1">
                            <button class="uk-button uk-border-pill {{ is_null($status) ? 'uk-button-primary' : '' }}"
                                    wire:click="
                                $set('status',
                                null)">
                                <span class="uk-icon uk-margin-small-right"
                                      uk-icon="icon: briefcase-alt"></span>
                                All Listings
                            </button>
                        </li>
                        <li class="{{ $status === App\Domain\States\ListingStatusEnum::ACTIVE->value ? 'uk-active' : '' }}"
                            tabindex="-1">
                            <button class="uk-button uk-border-pill {{ $status === App\Domain\States\ListingStatusEnum::ACTIVE->value ? 'uk-button-primary' : '' }}"
                                    wire:click="$set('status', '{{ App\Domain\States\ListingStatusEnum::ACTIVE->value }}')">
                                <span class="uk-icon uk-margin-small-right"
                                      uk-icon="icon: check;ratio: 1.2"></span>
                                Active Listings
                            </button>
                        </li>
                        <li class="{{ $status === App\Domain\States\ListingStatusEnum::PENDING->value ? 'uk-active' : '' }}"
                            tabindex="-1">
                            <button class="uk-button uk-border-pill {{ $status === App\Domain\States\ListingStatusEnum::PENDING->value ? 'uk-button-primary' : '' }}"
                                    wire:click="$set('status', '{{ App\Domain\States\ListingStatusEnum::PENDING->value }}')">
                                <span class="uk-icon uk-margin-small-right"
                                      uk-icon="icon: hourglass;ratio: 1.2"></span>
                                Pending Listings
                            </button>
                        </li>
                        <li class="{{ $status === App\Domain\States\ListingStatusEnum::CLOSED->value ? 'uk-active' : '' }}"
                            tabindex="-1">
                            <button class="uk-button uk-border-pill {{ $status === App\Domain\States\ListingStatusEnum::CLOSED->value ? 'uk-button-primary' : '' }}"
                                    wire:click="$set('status', '{{ App\Domain\States\ListingStatusEnum::CLOSED->value }}')">
                                <span class="uk-icon uk-margin-small-right"
                                      uk-icon="icon: close;ratio: 1.2"></span>
                                Closed Listings
                            </button>
                        </li>
                    </ul>
                </div>

            </aside>

        </div>
        <div class="uk-flex-first@m uk-flex-last uk-width-expand@m">
            <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                 uk-grid>
                @forelse ($listings as $listing)
                    <div class="uk-width-1-1 uk-panel uk-first-colum {{ !$loop->first ? 'uk-grid-margin' : '' }}">
                        <div
                             class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded uk-box-shadow-medium">
                            <h3 class="uk-text-bold uk-cart-title uk-margin-remove-vertical">
                                <a href="{{ route('dashboard.listings.show', $listing->slug) }}"
                                   class="uk-link-heading">
                                    {{ $listing->title }}
                                </a>
                            </h3>
                            <a href="#"
                               class="uk-link-heading">
                                {{ $listing->company->name }}
                            </a>
                            <p class="uk-margin-small-top uk-text-capitalize">
                                {{ $listing->location }}
                                <span class="uk-icon uk-text-secondary"
                                      uk-icon="icon: circle; ratio: 0.5"></span>
                                {{ $listing->listing_type->name }}
                            </p>
                            <div class="uk-grid uk-grid-medium uk-child-width-1-1 uk-margin-top"
                                 uk-grid>
                                <div class="uk-panel uk-width-expand@s">
                                    <div class="uk-grid uk-grid-small uk-flex-middle"
                                         uk-grid>
                                        <div class="uk-width-auto@s">
                                            <div
                                                 class="uk-button uk-border-rounded uk-border uk-button-small uk-text-uppercase uk-disabled ">
                                                <span class="uk-icon uk-text-{{ $listing->status->color() }}"
                                                      uk-icon="icon: circle"></span>
                                                {{ $listing->status->value }}
                                            </div>
                                        </div>
                                        <div class="uk-width-expand@s">
                                            <p class="uk-text-muted uk-margin-remove-vertical">
                                                Posted {{ $listing->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-auto@s">
                                    <div
                                         class="uk-button uk-border-rounded uk-button-small uk-border uk-disabled uk-background-muted">
                                        {{ $listing->clicks_count }} Clicks
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="uk-width-1-1 uk-panel uk-margin-medium">
                        <div class="uk-alert uk-alert-primary uk-margin"
                             uk-alert>
                            <p>You have no listings yet.</p>
                        </div>

                        <a href="{{ route('listing.create') }}"
                           class="uk-button uk-button-success uk-border-rounded">Create New Listing</a>

                    </div>
                @endforelse
            </div>

            <div class="uk-width-1-1">
                {{ $listings->links() }}
            </div>
        </div>
    </div>

</div>
