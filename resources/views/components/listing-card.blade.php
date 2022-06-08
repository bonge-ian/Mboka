<article @class([
    'uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-card-small uk-card-hover',
    'uk-dark' => $listing->is_highlight_color_light,
    'uk-light' => !$listing->is_highlight_color_light && $listing->is_highlighted,
])
         @if ($listing->is_highlighted)
    style="background-color: {{ $listing->highlight_color }}"
    @endif>

    <div class="uk-grid uk-grid-small uk-child-width-expand"
         uk-grid>
        <div class="uk-width-auto">
            <figure class="uk-panel">
                @if ($listing->show_logo)
                    <img src="{{ asset('storage/companies/assets/' . $listing->company->logo) }}"
                         alt="{{ $listing->company->name }}'s Logo"
                         loading="lazy"
                         class="uk-border-circle"
                         width="70"
                         height="70">
                @else
                    <img src="{{ asset('storage/assets/img/no-image.svg') }}"
                         alt="No Image SVG"
                         loading="lazy"
                         class="uk-border-circle"
                         width="70"
                         height="70">
                @endif
            </figure>
        </div>
        <div>
            <div class="uk-grid uk-grid-small"
                 uk-grid>
                <div class="uk-width-expand">
                    <a class="uk-card-title uk-text-bold uk-margin-remove-vertical uk-link-toggle">
                        <span class="uk-link-heading">{{ $listing->title }}</span>
                    </a>
                    <p class="uk-margin-remove-vertical">
                        <span class="uk-text-capitalize uk-text-secondary">{{ $listing->location }}</span>
                        <span class="uk-text-emphasis uk-icon "
                              uk-icon="icon: circle;ratio: 0.35"></span>
                        <span class="uk-text-capitalize uk-text-muted">{{ $listing->company->name }}</span>
                    </p>
                </div>
                <div class="uk-width-auto">
                    <div class="uk-align-right">
                        <span class="uk-label uk-label-default uk-border-rounded uk-text-capitalize">
                            {{ $listing->category->name }}
                        </span>
                        @if ($listing->is_pinned)
                            <span class="uk-icon uk-margin-small-left"
                                  uk-icon='icon: pinned'>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="uk-grid uk-grid-small uk-flex-middle uk-margin-remove-top"
                 uk-grid>
                <div class="uk-width-expand uk-first-column">
                    <p class="uk-margin-small-vertical uk-text-truncate uk-width-1-1">
                        {{ $listing->overview }}
                    </p>
                </div>
                <div class="uk-width-1-6 uk-text-right">
                    <a href="{{ route('listing.apply', $listing->slug) }}"
                       class="uk-button uk-button-primary uk-border-rounded sible"
                       id="apply-link-{{ $listing->id }}"
                       target="_blank">
                        Apply now
                    </a>
                </div>
            </div>
            <div class="uk-grid uk-grid-small uk-grid-match uk-child-width-auto uk-flex-middle ">
                <div class="uk-width-expand">
                    <div class="uk-grid uk-grid-small uk-grid-match uk-child-width-auto uk-flex-middle ">
                        @foreach ($listing->tags as $tag)
                            <div>
                                <div class="uk-button uk-border uk-border-rounded uk-text-capitalize uk-button-small">
                                    {{ $tag->name }}
                                </div>
                            </div>
                        @endforeach
                        <div>
                            <div
                                 class="uk-button uk-button-secondary uk-border-rounded uk-text-capitalize uk-button-small">
                                {{ $listing->listing_type->name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div>


                    <div class="uk-text-right">
                        <p class="uk-text-meta uk-margin-remove-vertical">
                            {{ $listing->created_at->diffForHumans() }}
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</article>
