 <x-app-layout title="{{ $listing->title }}">
     <article class="uk-section uk-section-default uk-padding-medium-top uk-padding-remove-bottom">
         <div class="uk-container">
             <header class="uk-tile-primary uk-height-small uk-border-rounded"></header>
             <div class="uk-tile uk-tile-default uk-width-1-1 uk-padding-small-top uk-text-left@s uk-text-center">
                 @if ($listing->show_logo)
                     <img src="{{ asset('/storage/companies/assets/' . $listing->company->logo) }}"
                          alt="{{ $listing->company->name }}'s' Logo"
                          width="100"
                          height="100"
                          class="uk-border-circle uk-position-relative listing-header-image">
                 @else
                     <img src="{{ asset('/storage/assets/img/no-image.svg') }}"
                          alt="No Image SVG"
                          width="100"
                          height="90"
                          class="uk-border-circle uk-position-relative listing-header-image"
                          uk-svg>
                 @endif

                 <section class="uk-panel uk-position-relative  listing-header-details">
                     <h1 class="uk-margin-remove-vertical uk-text-bold">{{ $listing->title }}</h1>
                     <p class="uk-margin-remove-top uk-margin-small-bottom uk-text-lead">
                         <span>{{ $listing->company->name }}</span>
                         <span class="uk-icon uk-text-primary"
                               uk-icon="icon: verified"></span>
                     </p>

                     <div class="uk-panel uk-flex uk-flex-between@s uk-flex-center uk-flex-middle uk-text-center">
                         <div class="uk-text-meta ">
                             <p class="uk-text-middle uk-display-inline">
                                 <a href="#">{{ $listing->location }}</a>
                                 <span class="uk-margin-small-left uk-margin-small-right">&#10047;</span>
                                 <span>{{ $listing->created_at->diffForHumans() }}</span>
                             </p>
                         </div>
                         <div class="uk-visible@s">
                             <a href="{{ $listing->apply_url }}"
                                class="uk-button uk-button-primary uk-border-rounded">Apply</a>
                         </div>
                     </div>
                 </section>
             </div>

             <div class="uk-margin uk-hidden@m">
                 <div class="uk-section-muted uk-section-small">
                     <div class="uk-grid uk-grid-medium uk-grid-match uk-child-width-auto uk-flex-middle uk-text-center uk-flex-center"
                          uk-grid>
                         <div class="uk-panel uk-text-center">
                             <div class="uk-icon"
                                  uk-icon="icon: skyscraper"></div>
                             <p class="uk-small-top uk-text-bold uk-text-capitalize">
                                 {{ $listing->listing_type->name }}
                             </p>
                         </div>
                         <div class="uk-panel uk-text-center">
                             <div class="uk-icon"
                                  uk-icon="icon:sparkles;"></div>
                             <p class="uk-small-top uk-text-bold uk-text-capitalize">
                                 {{ $listing->employee_availability->name }}</p>
                         </div>

                         @if ($listing->on_site_days)
                             <div class="uk-panel uk-text-center">
                                 <div class="uk-icon"
                                      uk-icon="icon:briefcase;"></div>
                                 <p class="uk-small-top uk-text-bold"> {{ $listing->on_site_days }} days</p>
                             </div>
                         @endif

                         @if ($listing->is_pinned)
                             <div class="uk-panel uk-text-center">
                                 <div class="uk-icon"
                                      uk-icon="icon: pinned;"></div>
                             </div>
                         @endif
                     </div>
                 </div>

                 <hr>
             </div>
         </div>
     </article>

     <article class="uk-section uk-section-default uk-padding-remove-top">
         <div class="uk-container">
             <div class="uk-grid uk-child-width-1-1 uk-grid-medium "
                  uk-grid>
                 <div class="uk-width-2-3@m">
                     <div class="uk-panel uk-tile uk-tile-default uk-box-shadow-medium  uk-border-rounded">
                         <h2 class="uk-margin-small-top uk-text-bold">About the Job</h2>
                         <p class="uk-margin-remove-top">
                             {{ $listing->overview }}
                         </p>

                         <h3 class="uk-margin-small-top uk-text-bold">Experience</h3>
                         <p class="uk-margin-remove-top">
                             {{ $listing->experience }}

                         </p>

                         <div class="uk-background-muted uk-border-rounded uk-padding">
                             <h4 class="uk-margin-small-top uk-text-bold ">Tools Used/Tech Stack</h4>

                             @if ($listing->tags->isNotEmpty())
                                 <div class="uk-button-group ">
                                     @forelse ($listing->tags as $tag)
                                         <button
                                                 class="uk-button uk-button-small @if (!$loop->last) uk-margin-small-right @endif">
                                             {{ $tag->name }}
                                         </button>
                                     @empty
                                     @endforelse
                                 </div>
                             @endif
                         </div>

                     </div>
                 </div>

                 <div class="uk-width-1-3@m">
                     <aside class="uk-panel uk-tile uk-tile-muted uk-box-shadow-medium uk-border-rounded uk-position-z-index"
                            uk-sticky="offset: 80; end: true; media: @m;">
                         <h3 class="uk-text-bold uk-margin-small-bottom">Salary and Perks</h3>
                         <p class="uk-margin-remove-top">
                             {{ $listing->perks }}
                         </p>
                         <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                              uk-grid>
                             <div>
                                 <div class="uk-child-width-expand uk-grid-column-medium uk-flex-middle uk-grid"
                                      uk-grid="">
                                     <div class="uk-width-auto uk-first-column">
                                         <div class="uk-icon uk-icon-button "
                                              uk-icon="icon: folder;"> </div>
                                     </div>
                                     <div>
                                         <h4 class="uk-h6 uk-margin-remove-bottom uk-text-bold">
                                             {{ $listing->category->name }}
                                         </h4>
                                         <p class="uk-text-meta uk-text-muted uk-margin-remove-top">Industry</p>
                                     </div>
                                 </div>
                             </div>
                             <div>
                                 <div class="uk-child-width-expand uk-grid-column-medium uk-flex-middle uk-grid"
                                      uk-grid="">
                                     <div class="uk-width-auto uk-first-column">
                                         <div class="uk-icon uk-icon-button"
                                              uk-icon="icon: skyscraper;">

                                         </div>
                                     </div>
                                     <div>
                                         <h4 class="uk-h6 uk-margin-remove-bottom uk-text-bold">
                                             {{ $listing->listing_type->name }}
                                         </h4>
                                         <p class="uk-text-meta uk-text-muted uk-margin-remove-top">Job Type</p>
                                     </div>
                                 </div>
                             </div>
                             <div>
                                 <div class="uk-child-width-expand uk-grid-column-medium uk-flex-middle uk-grid"
                                      uk-grid="">
                                     <div class="uk-width-auto uk-first-column">
                                         <div class="uk-icon uk-icon-button"
                                              uk-icon="icon: sparkles;">

                                         </div>
                                     </div>
                                     <div>
                                         <h4 class="uk-h6 uk-margin-remove-bottom uk-text-bold">
                                             {{ $listing->employee_availability->name }}
                                         </h4>
                                         <p class="uk-text-meta uk-text-muted uk-margin-remove-top">Employee
                                             Availability
                                         </p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </aside>
                 </div>
             </div>
         </div>
     </article>

     <article class="uk-section uk-section-default uk-padding-small-top">
         <div class="uk-container">
             <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                  id="about-related-jobs"
                  uk-grid>
                 <div class="uk-width-2-3@m">
                     <div class="uk-tile uk-tile-default uk-box-shadow-medium uk-sticky uk-border-rounded uk-position-z-index"
                          uk-sticky="media: @m;end: #about-related-jobs">
                         <h2 class="uk-h4 uk-text-bold">
                             About Company
                         </h2>
                         <div class="uk-grid-small uk-flex-middle"
                              uk-grid>
                             <div class="uk-width-auto">
                                 @if ($listing->show_logo)
                                     <img class="uk-border-circle uk-object-fill"
                                          width="100"
                                          height="100"
                                          alt="{{ $listing->company->name }}'s Logo"
                                          src="{{ asset('/storage/companies/assets/' . $listing->company->logo) }}">
                                 @else
                                     <img class="uk-border-circle"
                                          width="100"
                                          height="90"
                                          src="{{ asset('/storage/assets/img/no-image.svg') }}"
                                          alt="No Image SVG"
                                          uk-svg>
                                 @endif
                             </div>
                             <div class="uk-width-expand">
                                 <h3 class="uk-h4 uk-text-bold uk-margin-remove-bottom">
                                     <span>Bonge Inc</span>
                                     <span class="uk-text-primary"
                                           uk-icon="icon: verified"></span>
                                 </h3>
                                 <p class="uk-text-meta uk-margin-remove-top uk-margin-small-bottom">
                                     <span class=" uk-icon"
                                           uk-icon="icon: location"></span>
                                     <span>{{ $listing->company->headquarters }}</span>
                                 </p>
                                 <a href="{{ $listing->company->website }}"
                                    class="uk-button uk-button-link uk-margin-top"
                                    target="_blank">
                                     <span class="uk-icon"
                                           uk-icon="icon: link"></span>
                                     <span>{{ $listing->company->website }}</span>
                                 </a>
                             </div>
                         </div>

                         <hr>
                         <p>
                             {{ $listing->company->bio }}
                         </p>
                     </div>
                 </div>
                 <div class="uk-width-1-3@m uk-visible@m">
                     <aside class="uk-panel uk-tile uk-tile-muted uk-box-shadow-medium uk-border-rounded">
                         <h3 class="uk-text-bold uk-margin-remove-bottom">Related Jobs</h3>
                         <p class="uk-margin-remove-top uk-text-meta">
                             {{ $relatedListings->count() }} jobs
                         </p>
                         <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                              uk-grid>
                             @foreach ($relatedListings as $related)
                                 <div>
                                     <div class="uk-panel">
                                         <a href="{{ route('listing.show', $related->slug) }}"
                                            class="uk-link-heading uk-text-bold uk-margin-remove-bottom">
                                             {{ $related->title }}
                                         </a>
                                         <div class="uk-child-width-expand uk-grid-column-small uk-flex-middle uk-grid"
                                              uk-grid="">
                                             <div>
                                                 <p
                                                    class="uk-text-middle uk-display-inline uk-text-meta uk-text-muted uk-margin-remove-bottom">
                                                     <span
                                                           class="uk-text-success">{{ $related->company->name }}</span>
                                                     <span
                                                           class="uk-margin-small-left uk-margin-small-right ">&diams;</span>
                                                     <span class="uk-text-secondary">{{ $related->location }}</span>
                                                 </p>

                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             @endforeach
                         </div>
                     </aside>
                 </div>
             </div>

             <div class="uk-hidden@s uk-margin">
                 <a href="{{ $listing->apply_url }}"
                    class="uk-button uk-button-primary uk-width-1-1 ">Apply Now</a>
             </div>
         </div>
     </article>

 </x-app-layout>
