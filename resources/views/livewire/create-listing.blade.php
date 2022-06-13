<div class="uk-container uk-container-small uk-position-relative"
     id="create-listing">

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
    <div class="uk-margin uk-width-1-1 " hidden>
        <a class="uk-button uk-button-text"
           href="#create-listing"
           uk-scroll>Scroll down</a>
    </div>
    @push('scripts')
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

            Livewire.on('advanceToStep', () => {
                setTimeout(() => {
                    UIkit.scroll(
                            document.querySelector("[uk-scroll]")
                        )
                        .scrollTo(
                            document.querySelector('#product-listings')
                        );
                }, 900);
            })
        </script>
    @endpush

</div>
