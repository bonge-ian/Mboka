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

                @if ($this->chart_type === 'multiline')
                    <livewire:livewire-line-chart key="{{ $chart->reactiveKey() }}"
                                                  :line-chart-model="$chart" />
                @endif

                @if ($this->chart_type === 'multicolumn')
                    <livewire:livewire-column-chart key="{{ $chart->reactiveKey() }}"
                                                    :column-chart-model="$chart" />
                @endif

            </div>
        </section>
    @else
        <div class="uk-alert uk-alert-primary uk-margin"
             uk-alert>
            <p>
                The chart analysis may either be processing or failed to load due to some technical difficulty or you
                may have no views or clicks yet.
            </p>
        </div>

    @endif
</div>
