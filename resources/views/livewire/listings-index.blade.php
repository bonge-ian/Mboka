<div class="uk-width-1-1"
     id="listings">

    <aside class="uk-tile uk-tile-muted">
        <div class="uk-width-3-4@m uk-width-1-1 uk-align-center uk-margin-medium-bottom">

            <div class="uk-grid uk-grid-small uk-grid-match"
                 uk-grid
                 role="form"
                 aria-label="Search for a listing.">
                <div class="uk-width-expand">
                    <input type="search"
                           wire:model.defer="search"
                           id="search"
                           autocomplete
                           class="uk-input uk-border-rounded"
                           aria-label="Search through site content for listings"
                           minlength="4"
                           placeholder="Job title,location,or keyword...">
                </div>
                <div class="uk-width-auto">

                    <button wire:click.prevent="searchListing"
                            type="button"
                            name="search-for-a-listing"
                            class="uk-button uk-button-secondary uk-border-rounded">
                        <span class="uk-icon"
                              uk-icon="icon: search"></span>
                    </button>
                </div>
            </div>


        </div>
        <div class="uk-grid uk-grid-row-medium uk-grid-column-small uk-flex-center@m uk-flex-middle uk-child-width-auto"
             uk-grid>
            @forelse ($this->popularCategories as $category)
                <div @class([
                    'uk-first-column' => $loop->first,
                ])>
                    <div wire:click.prevent="$emit('filterByCategory', {{ $category->id }})"
                         @class([
                             'uk-button uk-border-pill uk-button-default',
                             'uk-button-primary' => $category_filters->contains($category->id),
                         ])>
                        {{ $category->name }} ({{ $category->listings_count }})
                    </div>
                </div>
            @empty
                <div class="uk-width-1-1">

                </div>
            @endforelse
        </div>
    </aside>
    <section class="uk-tile uk-tile-default">
        <h2 class="uk-heading-small uk-text-bold uk-margin-remove-bottom">All Listings</h2>
        <hr class="uk-divider-small">

        <div class="uk-grid uk-grid-medium uk-child-width-1-1 uk-grid-match"
             uk-grid>
            @foreach ($listings as $listing)
                <div>
                    <x-listing-card :listing="$listing" />
                </div>
            @endforeach
        </div>

        @if ($listings->hasMorePages())
            <div class="uk-width-1-1 uk-margin-medium"
                 x-data="{
                     pageData: @js($pagination_type === 'cursor' ? $listings->nextCursor()?->encode() : $listings->currentPage()),
                     observe() {
                         let observer = new IntersectionObserver(
                             (entries) => {
                                 entries.forEach(entry => {
                                     if (entry.isIntersecting) {
                                         @this.call('loadMore', this.pageData)
                                     }
                                 })
                             }, {
                                 root: null
                             }
                         )
                         observer.observe(this.$el)
                     }
                 }"
                 x-init="observe">

                <button wire:click.prevent="loadMore('{{ $pagination_type === 'cursor' ? $listings?->nextCursor()?->encode() : $listings->currentPage() }}')"
                        class="uk-width-1-1 uk-button uk-button-secondary uk-border-rounded uk-button-large uk-text-uppercase">
                    Load More
                </button>
            </div>
        @endif
    </section>
</div>
