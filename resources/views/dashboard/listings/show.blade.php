<x-dashboard-layout title="{{ $listing->title }}">
    <section class="uk-tile uk-padding-small-horizontal">
        <header class="uk-grid uk-flex-middle uk-grid-medium"
                uk-grid>
            <div class="uk-width-expand@m uk-panel">
                <div class="uk-grid uk-flex-middle"
                     uk-grid>
                    <div class="uk-width-auto">
                        @if ($listing->company->logo)
                            <img class="uk-border-circle"
                                 width="80"
                                 height="80"
                                 src="{{ asset('storage/companies/assets/' . $listing->company->logo) }}">
                        @endif
                    </div>
                    <div class="uk-width-expand">
                        <h1 class="uk-text-bold uk-margin-remove-bottom uk-h3">
                            {{ $listing->title }}
                            <span class="uk-hidden@m uk-icon uk-text-success"
                                  uk-icon="icon: circle"></span>
                        </h1>
                        <p class="uk-margin-remove-top uk-text-capitalize">
                            <span>{{ $listing->location }}</span>
                            <span>&bull;</span>
                            <span>{{ $listing->listing_type->name }}</span>
                        </p>
                        <button type="button"
                                class="uk-button uk-button-default uk-border-rounded uk-button-small uk-hidden@m"
                                uk-toggle="target: #edit-listing">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: file-edit;ratio: 0.8"></span>
                            Edit Listing
                        </button>
                    </div>
                </div>

            </div>
            <div class="uk-width-auto@m uk-panel uk-visible@m">
                <div class="uk-child-width-auto uk-grid uk-grid-small uk-grid-match"
                     uk-grid>
                    <div>
                        <p class="uk-text-meta uk-text-center uk-margin-remove-vertical">Status</p>
                        <div class="uk-button uk-border uk-border-pill uk-disabled uk-button-small">
                            <span class="uk-icon uk-text-{{ $listing->status->color() }}"
                                  uk-icon="icon: circle;ratio: 0.8"></span>
                            <span class="uk-text-bold uk-text-capitalize">
                                {{ $listing->status->name }}
                            </span>
                        </div>
                    </div>
                    <div>
                        <p class="uk-text-meta uk-text-center uk-margin-remove-vertical">Action</p>
                        <button type="button"
                                class="uk-button uk-button-default uk-border-rounded uk-button-small "
                                uk-toggle="target: #edit-listing">
                            <span class="uk-icon uk-margin-small-right"
                                  uk-icon="icon: file-edit;ratio: 0.8"></span>
                            Edit Listing
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <div class="uk-margin-medium-top">
            <ul class="uk-tab uk-child-width-expand"
                uk-tab="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li class="uk-active">
                    <a href="#">
                        <span class="uk-icon uk-margin-small-right uk-visible@m"
                              uk-icon="icon: detail;"></span>
                        <span>Details</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="uk-icon uk-margin-small-right uk-visible@m"
                              uk-icon="icon: analyse;"></span>
                        <span>Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="uk-icon uk-margin-small-right uk-visible@m"
                              uk-icon="icon: wallet;"></span>
                        <span>Transactions</span>
                    </a>
                </li>
            </ul>
            <ul class="uk-switcher uk-margin">
                <li>
                    <section class="uk-section uk-section-small">
                        <div class="uk-grid uk-grid-small uk-grid-match"
                             uk-grid>
                            <div class="uk-width-expand@m">
                                <div class="uk-card uk-card-default uk-box-shadow-medium">
                                    <div
                                         class="uk-card-header uk-flex uk-flex-between uk-flex-middle uk-padding-small-vertical">
                                        <h2 class="uk-h4 uk-text-bold uk-margin-remove-vertical">Job Overview</h2>
                                        <a class="uk-icon"
                                           href="#edit-listing"
                                           uk-icon="icon: pencil"
                                           uk-tooltip="title: Edit Listing"
                                           uk-toggle>

                                        </a>
                                    </div>
                                    <div class="uk-card-body ">
                                        <p>{{ $listing->overview }}</p>

                                        <h3 class="uk-text-bold uk-margin-remove-bottom">Experience</h3>
                                        <p>{{ $listing->experience }}</p>

                                        <h3 class="uk-text-bold uk-margin-remove-bottom">Tools/Stack</h3>
                                        <div class="uk-placeholder uk-padding-small-vertical">
                                            <div class="uk-grid uk-flex-middle uk-grid-small uk-child-width-auto">
                                                @forelse ($listing->tags as $tag)
                                                    <div>
                                                        <div
                                                             class="uk-label uk-background-muted  uk-text-emphasis uk-border-rounded uk-text-capitalize">
                                                            {{ $tag->name }}
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="uk-panel uk-placeholder">
                                                        <p>No tools/tech stack listed!</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-3@m">
                                <div class="uk-panel uk-width-1-1">
                                    <div class="uk-card uk-card-small uk-card-body uk-card-hover uk-background-muted">
                                        <p class="uk-text-bold uk-text-small">
                                            Job Details
                                        </p>
                                        <div class="uk-grid uk-grid-small uk-child-width-1-1"
                                             uk-grid>
                                            <div>
                                                <div class="uk-grid uk-grid-small uk-flex-middle uk-child-width-expand"
                                                     uk-grid>
                                                    <div class="uk-width-auto">
                                                        <a href="#edit-listing"
                                                           class="uk-icon"
                                                           uk-icon="icon: folder"
                                                           uk-toggle></a>
                                                    </div>
                                                    <div>
                                                        <h5 class="uk-margin-remove-bottom uk-text-bold">Category name
                                                        </h5>
                                                        <p
                                                           class="uk-text-muted uk-text-small  uk-margin-remove-vertical">
                                                            {{ $listing->category->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="uk-grid uk-grid-small uk-flex-middle uk-child-width-expand"
                                                     uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span class="uk-icon"
                                                              uk-icon="icon: calendar"></span>
                                                    </div>
                                                    <div>
                                                        <h5 class="uk-margin-remove-bottom uk-text-bold">
                                                            {{ $listing->created_at->format('d M, Y') }}
                                                        </h5>
                                                        <p
                                                           class="uk-text-muted  uk-text-small  uk-margin-remove-vertical">

                                                            Date created
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="uk-grid uk-grid-small uk-flex-middle uk-child-width-expand"
                                                     uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span class="uk-icon"
                                                              uk-icon="icon: calender-check"></span>
                                                    </div>
                                                    <div>
                                                        <h5 class="uk-margin-remove-bottom uk-text-bold">
                                                            {{ $listing->expired_at->format('d M, Y') }}
                                                        </h5>
                                                        <p
                                                           class="uk-text-muted uk-text-small  uk-margin-remove-vertical">
                                                            Expiration Date
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="uk-grid uk-grid-small uk-flex-middle uk-child-width-expand"
                                                     uk-grid>
                                                    <div class="uk-width-auto">
                                                        <span class="uk-icon"
                                                              uk-icon="icon: link"></span>
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <h5 class="uk-margin-remove-bottom uk-text-bold uk-text-break">
                                                            {{ $listing->apply_url }}
                                                        </h5>
                                                        <p
                                                           class="uk-text-muted uk-text-small  uk-margin-remove-vertical">
                                                            Application Link
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </section>
                </li>
                <li>
                    <section class="uk-section uk-section-small">
                        <header class="uk-grid uk-grid-medium uk-child-width-1-2@m uk-child-width-1-1 uk-grid-match"
                                uk-grid>
                            <div>
                                <div class="uk-panel">
                                    <x-dashboard.overview :count="$listing->views_count"
                                                          description="Views"
                                                          icon="briefcase"
                                                          description_text_color="warning"
                                                          class="uk-background-primary" />
                                </div>
                            </div>
                            <div>
                                <div class="uk-panel">
                                    <x-dashboard.overview :count="$listing->clicks_count"
                                                          description="Clicks"
                                                          icon="click"
                                                          description_text_color="success"
                                                          class="uk-background-secondary" />
                                </div>
                            </div>
                        </header>
                    </section>
                </li>
                <li>
                    <section class="uk-section-small uk-section uk-overflow-auto">
                        <table class="uk-table uk-table-responsive uk-table-divider">
                            <thead>
                                <tr>
                                    <th>Package Details</th>
                                    <th>Amount</th>
                                    <th>Transaction reference</th>
                                    <th>Payment method</th>
                                    <th>Paid at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($listing->payments as $payment)
                                    <tr>
                                        <td>
                                            {{ $listing->title }}
                                        </td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->code }}</td>
                                        <td>{{ $payment->payment_method }}</td>
                                        <td>{{ $payment->paid_at->format('dS M, Y h:m a') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <x-alert type="default"
                                                     message="You haven't made any payments yet." />
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </section>
                </li>
            </ul>
        </div>
    </section>

    <livewire:dashboard.edit-listing :listing="$listing" />
</x-dashboard-layout>
