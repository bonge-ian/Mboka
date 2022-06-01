<div class="uk-modal uk-modal-container {{ $errors->any() ? 'uk-open' : '' }}"
     id="edit-listing"
     uk-modal>
    <form wire:submit.prevent="updateListing"
          class="uk-modal-dialog uk-overflow-auto"
          uk-overflow-auto>
        <button class="uk-modal-close-outside uk-icon uk-close"
                type="button"
                uk-close></button>
        <header class="uk-modal-header">
            <h2 class="uk-modal-title uk-text-background">Edit Listing</h2>
        </header>
        <div class="uk-modal-body uk-padding-large">
            <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                 uk-grid>
                <div class="uk-panel uk-width-1-2@m  ">
                    <label for="title"
                           class="uk-form-label uk-text-bold">Job Title</label>
                    <div class="uk-form-controls">
                        <input type="text"
                               wire:model.defer="title"
                               id="title"
                               class="uk-input uk-border-rounded @error('title') uk-form-danger @enderror"
                               placeholder="Senior Software Engineer">
                    </div>
                    @error('title')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>

                <div class="uk-panel uk-width-1-2@m">
                    <label for="category"
                           class="uk-form-label uk-text-bold">Job Category</label>
                    <div class="uk-form-controls">
                        <select wire:model.defer="category_id"
                                id="category"
                                class="uk-select uk-border-rounded @error('category') uk-form-danger @enderror">
                            <option>Choose a category</option>
                            @foreach ($this->categories as $key => $name)
                                <option value="{{ $key }}">{{ $name }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('category_id')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>

                <div class="uk-panel uk-width-1-1@m uk-grid-margin uk-first-column">
                    <label for="listing_type"
                           class="uk-form-label uk-text-bold">Job Type</label>
                    <div class="uk-form-controls">
                        <select wire:model.defer="listing_type"
                                id="listing_type"
                                class="uk-select uk-border-rounded @error('listing_type') uk-form-danger @enderror">
                            <option>Choose a job type</option>
                            @foreach ($this->listingTypes as $listingType)
                                <option value="{{ $listingType->value }}">{{ $listingType->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('listing_type')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>

                <div class="uk-width-1-1@m uk-grid-margin uk-first-column">
                    <div class="uk-grid match uk-grid-medium"
                         uk-grid>
                        <div class="uk-panel {{ $this->showOnsiteDays ? 'uk-width-1-2@m' : 'uk-width-1-1@m' }}">
                            <label for="employee_availability"
                                   class="uk-form-label uk-text-bold">
                                Employee Availability
                            </label>
                            <div class="uk-form-controls">
                                <select wire:model.lazy="employee_availability"
                                        id="employee_availability"
                                        class="uk-select uk-border-rounded @error('employee_availability') uk-form-danger @enderror">
                                    <option>Choose the availability type</option>
                                    @foreach ($this->employeeAvailabilities as $employeeAvailability)
                                        <option value="{{ $employeeAvailability->value }}">
                                            {{ $employeeAvailability->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            @error('employee_availability')
                                <div class="uk-margin-small-top">
                                    <x-alert :message="$message"
                                             type="danger" />
                                </div>
                            @enderror
                        </div>

                        @if ($this->showOnsiteDays)
                            <div class="uk-panel uk-width-1-2@m">
                                <label for="on_site_days"
                                       class="uk-form-label uk-text-bold">
                                    On site days (1-5)
                                </label>
                                <div class="uk-form-controls uk-flex uk-flex-middle">
                                    <input type="number"
                                           wire:model.defer="on_site_days"
                                           id="on_site_days"
                                           min="1"
                                           max="5"
                                           class="uk-input uk-border-rounded @error('on_site_days') uk-form-danger @enderror"
                                           placeholder="On site days">
                                    <span class="uk-width-auto uk-text-emphasis uk-margin-small-left">days</span>
                                </div>
                                @error('on_site_days')
                                    <div class="uk-margin-small-top uk-width-auto">
                                        <x-alert :message="$message"
                                                 type="danger" />
                                    </div>
                                @enderror
                            </div>
                        @endif
                    </div>
                </div>

                <div class="uk-panel uk-width-1-2@m uk-grid-margin">
                    <label for="apply_url"
                           class="uk-form-label uk-text-bold">Apply link</label>
                    <div class="uk-form-controls">
                        <input type="url"
                               wire:model.defer="apply_url"
                               id="apply_url"
                               class="uk-input uk-border-rounded @error('apply_url') uk-form-danger @enderror"
                               placeholder="https://winker.com/job">
                    </div>
                    @error('apply_url')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>

                <div class="uk-panel uk-width-1-2@m uk-grid-margin">
                    <label for="location"
                           class="uk-form-label uk-text-bold">Location</label>
                    <div class="uk-form-controls">
                        <input type="text"
                               wire:model.defer="location"
                               id="location"
                               class="uk-input uk-border-rounded @error('location') uk-form-danger @enderror"
                               placeholder="Nairobi, Kenya">
                    </div>
                    @error('location')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>

                <div class="uk-panel uk-grid-margin">
                    <label for="overview"
                           class="uk-form-label uk-text-bold">About the job</label>
                    <div class="uk-form-controls">
                        <textarea wire:model.defer="overview"
          id="overview"
          rows="4"
          class="uk-textarea uk-border-rounded @error('overview')  @enderror"
          placeholder="An overview of the role."></textarea>

                    </div>
                    @error('overview')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>

                <div class="uk-panel uk-grid-margin">
                    <label for="experience"
                           class="uk-form-label uk-text-bold">Experience needed</label>
                    <div class="uk-form-controls">
                        <textarea wire:model.defer="experience"
          id="experience"
          rows="4"
          class="uk-textarea uk-border-rounded @error('experience')  @enderror"
          placeholder="The experience you're looking for."></textarea>

                    </div>
                    @error('experience')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>

                <div class="uk-panel uk-grid-margin">
                    <label for="perks"
                           class="uk-form-label uk-text-bold">Salary and Perks</label>
                    <div class="uk-form-controls">
                        <textarea wire:model.defer="perks"
          id="perks"
          rows="4"
          class="uk-textarea uk-border-rounded @error('perks')  @enderror"
          placeholder="Salary and perks you are offering. (benefits, holidays, medical covers e.t.c.)"></textarea>

                    </div>
                    @error('perks')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>
                <div class="uk-panel uk-width-1-1@m uk-grid-margin">
                    <label for="tags"
                           class="uk-form-label uk-text-bold">Tools used or Skillset (comma separated
                        attributes)</label>
                    <div class="uk-form-controls">
                        <input type="text"
                               wire:model.defer="tags"
                               id="tags"
                               class="uk-input uk-border-rounded @error('tags') uk-form-danger @enderror"
                               placeholder="E.g php,vue,mysql or slack,teams,dropbox,zoho crm">
                    </div>

                    @error('tags')
                        <div class="uk-margin-small-top">
                            <x-alert :message="$message"
                                     type="danger" />
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <footer class="uk-modal-footer uk-text-right">
            <button type="submit"
                    class="uk-button uk-button-primary uk-border-rounded">Update</button>
        </footer>
    </form>

    @push('scripts')
        <script>
            window.addEventListener('employee-availability-is-changed', () => {
                UIkit.modal(
                    document.querySelector('#edit-listing')
                ).show();
            });

            window.addEventListener('listing-updated', (e) => {
                UIkit.modal(
                    document.querySelector('#edit-listing')
                ).hide();

                UIkit.notification({
                    message: `<span uk-icon='icon: check'></span> ${e.detail.message}`,
                    status: 'success',
                    pos: 'top-right',
                    timeout: 1500
                });


                setInterval(() => {
                    window.location.reload();
                }, 2000);

            });
        </script>
    @endpush
</div>
