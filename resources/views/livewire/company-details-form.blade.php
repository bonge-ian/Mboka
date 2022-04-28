<div class="uk-panel uk-width-1-1">
    <article class="uk-section uk-section-large uk-padding-medium-top">
        <form wire:submit.prevent="submit">

            <fieldset class="uk-fieldset uk-tile uk-tile-default uk-border-rounded">
                <legend
                        class="uk-legend uk-background-primary uk-text-white uk-border-rounded uk-padding-small uk-width-auto">
                    2. Tell us about your company
                </legend>
                <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                     uk-grid>
                    <div class="uk-width-1-1">
                        <p class="uk-text-background uk-text-lead uk-text-bold">
                            Your company's information
                        </p>
                    </div>

                    <div class="uk-panel uk-width-1-2@m ">
                        <label for="name"
                               class="uk-form-label uk-text-bold">Company Name</label>
                        <div class="uk-form-controls">
                            <input type="text"
                                   wire:model.defer="name"
                                   id="name"
                                   class="uk-input uk-border-rounded @error('name') uk-form-danger @enderror"
                                   placeholder="Apple Inc.">
                        </div>
                        @error('name')
                            <div class="uk-margin-small-top">
                                <x-alert :message="$message"
                                         type="danger" />
                            </div>
                        @enderror
                    </div>

                    <div class="uk-panel uk-width-1-2@m">
                        <label for="headquarters"
                               class="uk-form-label uk-text-bold">Company Headquarters</label>
                        <div class="uk-form-controls">
                            <input type="text"
                                   wire:model.defer="headquarters"
                                   id="headquarters"
                                   class="uk-input uk-border-rounded @error('headquarters') uk-form-danger @enderror"
                                   placeholder="Nairobi, Kenya">

                        </div>
                        @error('headquarters')
                            <div class="uk-margin-small-top">
                                <x-alert :message="$message"
                                         type="danger" />
                            </div>
                        @enderror
                    </div>

                    @if ($isAlreadyUploaded)
                        <div class="uk-panel uk-width-1-2@m">
                            <div class="uk-inline">
                                <img src="{{ asset('storage/companies/assets/' . $logo) }}"
                                     alt="Company logo preview"
                                     width="150"
                                     height="200"
                                     class="uk-border-rounded"
                                     loading="lazy">
                                <div class="uk-position-top-right ">
                                    <a wire:click="clearUploaded()"
                                       uk-close
                                       class="uk-text-primary"></a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="uk-panel uk-width-1-2@m">
                            <label for="logo"
                                   class="uk-form-label uk-text-bold">Company Logo</label>
                            <div class="uk-form-controls">
                                <input type="file"
                                       wire:model.defer="logo"
                                       id="logo"
                                       class="uk-input uk-border-rounded @error('logo') uk-form-danger @enderror"
                                       placeholder="Your company logo">

                            </div>
                            @error('logo')
                                <div class="uk-margin-small-top">
                                    <x-alert :message="$message"
                                             type="danger" />
                                </div>
                            @enderror
                        </div>
                    @endif



                    <div class="uk-panel uk-width-expand@m">
                        <label for="website"
                               class="uk-form-label uk-text-bold">Company Website</label>
                        <div class="uk-form-controls">
                            <input type="url"
                                   wire:model.defer="website"
                                   id="website"
                                   class="uk-input uk-border-rounded @error('website') uk-form-danger @enderror"
                                   placeholder="https://apple.com">

                        </div>
                        @error('website')
                            <div class="uk-margin-small-top">
                                <x-alert :message="$message"
                                         type="danger" />
                            </div>
                        @enderror
                    </div>

                    <div class="uk-panel uk-grid-margin">
                        <label for="bio"
                               class="uk-form-label uk-text-bold">About your company</label>
                        <div class="uk-form-controls">
                            <textarea wire:model.defer="bio"
          id="bio"
          rows="4"
          class="uk-textarea uk-border-rounded @error('bio')  @enderror"
          placeholder="An bio of the role."></textarea>

                        </div>
                        @error('bio')
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
                                <span wire:loading.delay.long
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
