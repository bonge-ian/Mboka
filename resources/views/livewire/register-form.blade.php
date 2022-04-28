<div class="uk-width-1-1 uk-panel">
    <div class="uk-panel uk-width-1-1">
        <article class="uk-section uk-section-large uk-padding-medium-top">
            <form wire:submit.prevent="submit">

                <fieldset class="uk-fieldset uk-tile uk-tile-default uk-border-rounded">
                    <legend
                            class="uk-legend uk-background-primary uk-text-white uk-border-rounded uk-padding-small uk-width-auto">
                        4. Register with us
                    </legend>
                    <div class="uk-grid uk-grid-medium uk-child-width-1-1 uk-child-width-1-2@m"
                         uk-grid>
                         <div class="uk-width-1-1 uk-panel">
                                 <p class="uk-text-background uk-text-lead uk-text-bold">
                            Manage your posted listings.
                        </p>
                         </div>

                        <div>
                            <label class="uk-form-label uk-text-bold" for="name">{{ __('Name') }}</label>

                            <div class="uk-width-1-1">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon"
                                          uk-icon="icon: user"></span>
                                    <input class="uk-input uk-border-rounded  @error('name') uk-form-danger @enderror"
                                           type="text"
                                           wire:model.defer="name"
                                           value="{{ old('name') }}"
                                           id="name"
                                           required
                                           autofocus
                                           autocomplete="name" />
                                </div>

                                @error('name')
                                    <x-alert type="danger"
                                             :message="$message"></x-alert>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="uk-form-label uk-text-bold" for="email">{{ __('Email') }}</label>

                            <div class="uk-width-1-1">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon"
                                          uk-icon="icon: mail"></span>
                                    <input class="uk-input uk-border-rounded  @error('email') uk-form-danger @enderror"
                                           type="email"
                                           id="email"
                                           wire:model.defer="email"
                                           value="{{ old('email') }}"
                                           required />
                                </div>

                                @error('email')
                                    <x-alert type="danger"
                                             :message="$message"></x-alert>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="uk-form-label uk-text-bold" for="password">{{ __('Password') }}</label>

                            <div class="uk-width-1-1">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon"
                                          uk-icon="icon: lock"></span>
                                    <input class="uk-input uk-border-rounded  @error('password') uk-form-danger @enderror"
                                           type="password"
                                           wire:model.defer="password"
                                           id="password"
                                           required
                                           autocomplete="new-password" />
                                </div>

                                @error('password')
                                    <x-alert type="danger"
                                             :message="$message"></x-alert>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="uk-form-label uk-text-bold" for="password_confirmation">{{ __('Confirm Password') }}</label>

                            <div class="uk-width-1-1">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon"
                                          uk-icon="icon: check"></span>
                                    <input class="uk-input uk-border-rounded  @error('password_confirmation') uk-form-danger @enderror"
                                           type="password"
                                           wire:model.defer="password_confirmation"
                                           id="password_confirmation"
                                           required
                                           autocomplete="new-password" />
                                </div>

                                @error('password_confirmation')
                                    <x-alert type="danger"
                                             :message="$message"></x-alert>
                                @enderror
                            </div>
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

</div>
