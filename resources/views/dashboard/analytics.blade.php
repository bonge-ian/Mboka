<x-dashboard-layout title="{{ $user->name }} Analytics">
    @push('vendor')
        <script defer
                src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
        <script defer
                src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endpush

    <x-slot:page_title>
        Analytics
    </x-slot:page_title>

    <header class="uk-grid uk-grid-small uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1"
            uk-grid
            uk-height-match="target: > div > div >.overview-card">
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
           <div>
            <div class="uk-panel">
                <x-dashboard.overview :count="$total_expenditure->formatted()"
                                      description="Total Expenditure"
                                      icon="coin"
                                      count_size="uk-h2"
                                      description_text_color="warning"
                                      class="uk-background-primary" />
            </div>
        </div>
    </header>

    <div class="uk-width-1-1 uk-visible@m uk-margin-medium">
        <livewire:listings-chart :user_id="$user->id"
                                 chart_type="multiline" />
    </div>

    <div class="uk-margin-medium">
        <div class="uk-grid uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1 uk-grid-match"
             uk-grid>
            <div>
                <div class="uk-panel uk-overflow-auto uk-tile uk-tile-default uk-box-shadow-medium uk-padding-small uk-border-rounded">
                    <h3 class="uk-text-bold">Trending Countries</h3>
                    <hr>
                    <table class="uk-table uk-table-small uk-table-responsive uk-table-middle uk-table-divider">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>Clicks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($top_clicks_grouped_by_countries as $click)
                                <tr>
                                    <td class="uk-text-bold">{{ $click->country }}</td>
                                    <td class="uk-text-muted">{{ $click->total }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        <x-alert message="You have no clicks at the moment." />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="uk-panel">
                    <livewire:dashboard.listings-breakdown-chart :user_id="$user->id" />
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        @livewireChartsScripts
    @endpush
</x-dashboard-layout>
