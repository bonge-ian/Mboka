@props(['count', 'icon', 'description', 'description_text_color'])

<div
     {{ $attributes->merge(['class' => 'uk-card uk-card-small uk-card-body uk-card-default uk-box-shadow-medium overview-card']) }}>
    <div class="uk-grid uk-grid-small uk-flex-middle"
         uk-grid>
        <div class="uk-width-auto">
            <span class="uk-icon uk-background-muted uk-border-circle uk-padding-small uk-text-primary"
                  uk-icon="icon: {{ $icon }};ratio: 1.5"></span>
        </div>
        <div class="uk-width-expand">
            <h3 class="uk-h1 uk-text-bold uk-margin-remove-vertical uk-text-white">
                {{ $count }}
            </h3>
            <p class="uk-text-{{ $description_text_color }} uk-margin-remove-top uk-text-large">
                {{ $description }}
            </p>
        </div>
    </div>
</div>
