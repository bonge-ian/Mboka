<div wire:init="loadChart"
     class="uk-width-1-1  uk-margin-medium">
    @if ($chart)
        <section class="uk-width-1-1 uk-panel uk-card uk-card-default uk-box-shadow-medium uk-border-rounded">
            <header class="uk-card-header">
                <h3 class="uk-card-title uk-text-bold">
                    Listings Perfomance
                </h3>
            </header>
            <div class="uk-card-body uk-height-large">
                <livewire:livewire-pie-chart key="{{ $chart->reactiveKey() }}"
                                             :pie-chart-model="$chart" />

            </div>
        </section>
    @else
        <div class="uk-alert uk-alert-primary uk-margin"
             uk-alert>
            <p>
                The chart analysis may either be processing or failed to load due to some technical difficulty.
            </p>
        </div>
    @endif
</div>
