<x-dashboard-layout title="{{ $user->name }} Transactions">
    <x-slot:page_title>
        Transactions
    </x-slot:page_title>

    <header class="uk-grid uk-grid-small uk-child-width-1-1"
            uk-grid>
        <div>
            <div class="uk-panel">
                <x-dashboard.overview :count="$total_expenditure->formatted()"
                                      description="Total Expenditure"
                                      icon="coin"
                                      count_size="uk-h1"
                                      description_text_color="warning"
                                      class="uk-background-primary" />
            </div>
        </div>
    </header>

    <section class="uk-tile uk-tile-default uk-border-rounded uk-box-shadow-medium uk-margin-medium-top">
        <h2 class="uk-width-1-1">Transactions Breakdown</h2>
        <hr class="uk-divider-small">
        <div class="uk-width-1-1">
            <livewire:dashboard.user-payments :user_id="$user->id" />
        </div>
    </section>
</x-dashboard-layout>
