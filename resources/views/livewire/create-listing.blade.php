<div class="uk-container uk-container-small uk-position-relative">
    @if ($step === 1)
        <livewire:listing-details-form :state="$state"
                                       key="{{ 'step-' . $step }}"
                                       :step="$step" />
    @endif

    @if ($step === 2)
        <livewire:company-details-form :state="$state"
                                       key="{{ 'step-' . $step }}"
                                       :step="$step" />
    @endif

    @if ($step === 3)
        <livewire:boost-listing-form :state="$state"
                                     key="{{ 'step-' . $step }}"
                                     :step="$step" />
    @endif

    @if ($step === 4)
        @guest
            <livewire:register-form :state="$state"
                                    key="{{ 'step-' . $step }}"
                                    :step="$step" />
        @else
            <livewire:payment-form :state="$state"
                                   key="{{ 'step-' . $step }}"
                                   :step="$step" />
        @endguest
    @endif

    @if ($step === 5 && !auth()->check())
        <livewire:payment-form :state="$state"
                               key="{{ 'step-' . $step }}"
                               :step="$step" />
    @endif
    <div class="uk-position-cover uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle spinner-container"
         hidden>
        <div class="uk-icon uk-spinner"
             uk-spinner="ratio: 2"></div>
    </div>

    <script>
        window.addEventListener('redirect-request', event => {
            var el = document.querySelector('.spinner-container');
            var loading = setInterval(() => {
                el.removeAttribute('hidden');
                el.querySelector('.uk-spinner').classList.add('uk-display-block');

                setTimeout(() => {
                    clearInterval(loading);
                    el.querySelector('.uk-spinner').classList.remove('uk-display-block');
                    el.setAttribute('hidden');
                }, 1500);
            });

        });
    </script>
</div>
