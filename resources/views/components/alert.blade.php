@props(
    [
        'type' => 'default',
        'close' => false,
        'message'
    ]
)

<div {{ $attributes->merge(['class' => 'uk-border-rounded uk-alert uk-alert-'.$type]) }} uk-alert>
    @if ($close)
        <a class="uk-alert-close" uk-close></a>
    @endif
    @if ($message)
        <p>{{ $message }}</p>
    @endif
    {{ $slot }}
</div>
