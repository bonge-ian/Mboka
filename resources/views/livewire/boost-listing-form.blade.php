<div class="uk-width-1-1 uk-panel">
    <article class="uk-section uk-section-large uk-padding-medium-top">
        <form wire:submit.prevent="submit">
            <fieldset class="uk-fieldset uk-tile uk-tile-default uk-border-rounded">
                <legend
                        class="uk-legend uk-background-primary uk-text-white uk-border-rounded uk-padding-small uk-width-auto">
                    3. Enhance your listing
                </legend>
                <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                     uk-grid> 
                    <div class="uk-width-1-1">
                        <p class="uk-text-background uk-text-lead uk-text-bold">
                            Enhance your listing to stand out among the rest
                        </p>
                    </div>

                    <div class="uk-panel uk-width-1-1@m">
                        <label>
                            <input wire:model.defer="show_logo"
                                   type="checkbox"
                                   class="uk-checkbox uk-border-rounded @error('show_logo') uk-form-danger @enderror"
                                   checked>
                            Show company logo <span
                                  class="uk-text-secondary uk-text-bold">({{ $this->showLogoPrice }})</span>
                        </label>

                        @error('show_logo')
                            <div class="uk-margin-small-top">
                                <x-alert :message="$message"
                                         type="danger" />
                            </div>
                        @enderror
                    </div>

                    <div class="uk-panel uk-width-1-1@m">
                        <label>
                            <input wire:model="is_highlighted"
                                   type="checkbox"
                                   class="uk-checkbox uk-border-rounded @error('is_highlighted') uk-form-danger @enderror">
                            Highlight your listing to make it stand out <span
                                  class="uk-text-secondary uk-text-bold">({{ $this->highlightPrice }})</span>
                        </label>

                        @error('is_highlighted')
                            <div class="uk-margin-small-top">
                                <x-alert :message="$message"
                                         type="danger" />
                            </div>
                        @enderror
                    </div>

                    @if ($is_highlighted)
                        <div class="uk-width-1-1">
                            <label for="highlight_color"
                                   class="uk-form-label uk-text-bold">
                                Highlight color (Choose you favourite color to highlight your listing)
                            </label>

                            <div class="uk-form-controls">
                                <input type="color"
                                       wire:model.defer="highlight_color"
                                       id="highlight_color"
                                       class="uk-input uk-border-rounded uk-form-width-small uk-padding-remove"
                                       value="#16b6f5">
                            </div>

                            @error('highlight_color')
                                <div class="uk-margin-small-top">
                                    <x-alert :message="$message"
                                             type="danger" />
                                </div>
                            @enderror
                        </div>
                    @endif

                    <div class="uk-panel uk-width-1-1@m uk-first-column">
                        <label>
                            <input wire:model.defer="is_pinned"
                                   type="checkbox"
                                   class="uk-checkbox uk-border-rounded @error('is_pinned') uk-form-danger @enderror"
                                   checked>
                            Pin your listing for 30 days <span
                                  class="uk-text-secondary uk-text-bold">({{ $this->pinnedPrice }})</span>
                        </label>

                        @error('is_pinned')
                            <div class="uk-margin-small-top">
                                <x-alert :message="$message"
                                         type="danger" />
                            </div>
                        @enderror
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
                                <span>Next</span>
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
