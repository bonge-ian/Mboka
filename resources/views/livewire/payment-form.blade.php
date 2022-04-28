<div class="uk-width-1-1 uk-panel">
    <article class="uk-section uk-section-large uk-padding-medium-top">
        <form wire:submit.prevent="submit">

            <fieldset class="uk-fieldset uk-tile uk-tile-default uk-border-rounded">
                <legend
                        class="uk-legend uk-background-primary uk-text-white uk-border-rounded uk-padding-small uk-width-auto">
                    {{ $step }}. Checkout
                </legend>
                <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                     uk-grid>
                    <div class="uk-width-1-1">
                        <p class="uk-text-background uk-text-lead uk-text-bold">
                            Final steps to create a new listing
                        </p>
                    </div>

                    <div class="uk-width-1-1 uk-grid-margin uk-panel uk-h2">
                        <p class="uk-align-left">
                            Price
                        </p>
                        <p class="uk-align-right uk-text-success uk-text-bold">
                            {{  $this->totalPrice->formatted() }}
                        </p>
                    </div>

                    <div class="uk-width-1-1 uk-grid-margin ">
                        <div>
                            <a wire:click="$emit('advanceToStep', {{ --$step }})"
                               class="uk-button uk-button-secondary uk-border-rounded uk-align-left">
                                Back
                            </a>
                        </div>

                        <div>
                            <button type="submit"
                                    class="uk-button uk-button-primary uk-border-rounded uk-align-right">
                                <span>Pay {{ $this->totalPrice->formatted() }}</span>
                                <span wire:loading.delay
                                      wire:target="submit"
                                      class="uk-margin-small-left uk-icon uk-spinner"
                                      uk-spinner="ratio: 0.6"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </article>
</div>
