<x-dashboard-layout title="{{ $user->name }} Dashboard">
    @push('vendor')
        <script defer
                src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
        <script defer
                src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endpush

    <x-slot:page_title>
        Dashboard
    </x-slot:page_title>

    <header class="uk-grid uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1 uk-grid-match"
            uk-grid>
        <div>
            <div class="uk-panel">
                <x-dashboard.overview :count="$views_count"
                                      description="Jobs Viewed"
                                      icon="briefcase"
                                      description_text_color="warning"
                                      class="uk-background-primary" />
            </div>
        </div>
        <div>
            <div class="uk-panel">
                <x-dashboard.overview :count="$clicks_count"
                                      description="Jobs Clicks"
                                      icon="click"
                                      description_text_color="success"
                                      class="uk-background-secondary" />
            </div>
        </div>
    </header>


    <div class="uk-width-1-1 uk-visible@m uk-margin-medium">
        <livewire:listings-chart :user_id="$user->id"
                                 chart_type="multiline" />
    </div>


    <footer
            class="uk-width-1-1 uk-panel uk-tile uk-padding-small-vertical uk-tile-default uk-border-rounded uk-overflow-auto uk-box-shadow-medium uk-margin-medium">
        <table class="uk-table uk-table-divider uk-table-responsive uk-table-middle">
            <caption class="uk-text-lead uk-text-bold uk-text-large">Latest Listings</caption>
            <thead>
                <tr>
                    <th>Job title</th>
                    <th>Status</th>
                    <th>Location and Type</th>
                    <th>Views</th>
                    <th>Clicks</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($listings as $listing)
                    <tr>
                        <td class="uk-table-link">
                            <a href="{{ route('listing.show', $listing->slug) }}"
                               class="uk-link-heading">
                                {{ $listing->title }}
                            </a>
                        </td>
                        <td>
                            <div
                                 class="uk-label uk-label-{{ $listing->status->value }} uk-border-pill uk-display-inline-flex">
                                {{ $listing->status->name }}
                            </div>
                        </td>
                        <td>
                            <p class="uk-margin-remove-vertical uk-text-capitalize uk-text-muted">
                                {{ $listing->location }}
                                <span class="uk-icon uk-text-emphasis"
                                      uk-icon="icon: circle; ratio: 0.45"></span>
                                {{ $listing->listing_type->name }}
                            </p>
                        </td>
                        <td>
                            <p>
                                <span class="uk-icon uk-margin-small-right"
                                      uk-icon="icon: eye-check; ratio: 0.8"></span>
                                {{ $listing->views_count }}
                            </p>
                        </td>
                        <td>
                            <p>
                                <span class="uk-icon uk-margin-small-right"
                                      uk-icon="icon: click; ratio: 0.8"></span>
                                {{ $listing->views_count }}
                            </p>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </footer>
    @push('scripts')
        @livewireChartsScripts
    @endpush
</x-dashboard-layout>
