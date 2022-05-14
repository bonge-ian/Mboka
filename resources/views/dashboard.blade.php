<x-dashboard-layout title="{{ auth()->user()->name }}'s Dashoard">

    <x-slot :pageTitle="Dashboard" />

    <div class="uk-grid uk-grid-small uk-child-width-1-2@m uk-child-width-1-1"
         uk-grid>
        <div>
            <div
                 class="uk-panel uk-card uk-card-small uk-card-default uk-border-rounded uk-box-shadow-medium uk-card-body">
                <div class="uk-flex uk-flex-between uk-flex-top">
                    <p class="uk-text-muted">Overview</p>
                    <div class="uk-icon uk-text-success"
                         uk-icon="icon: trending-up-curve"></div>
                </div>
                <div class="uk-flex uk-flex-between uk-flex-bottom">
                    <div>
                        <h2 class="uk-card-title uk-margin-remove-vertical uk-text-bold">1000
                        </h2>
                        <p class="uk-margin-remove-vertical">Job Views</p>
                    </div>
                    <div>
                        <p class="uk-text-success uk-margin-remove-vertical">+5%</p>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <div
                 class="uk-panel uk-card uk-card-small uk-card-default uk-border-rounded uk-box-shadow-medium uk-card-body">
                <div class="uk-flex uk-flex-between uk-flex-top">
                    <p class="uk-text-muted">Conversion</p>
                    <div class="uk-icon uk-text-success"
                         uk-icon="icon: trending-up-curve"></div>
                </div>
                <div class="uk-flex uk-flex-between uk-flex-bottom">
                    <div>
                        <h2 class="uk-card-title uk-margin-remove-vertical uk-text-bold">
                            1000</h2>
                        <p class="uk-margin-remove-vertical">Job Clicks</p>
                    </div>
                    <div>
                        <p class="uk-text-success uk-margin-remove-vertical">+5%</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="uk-width-1-1 uk-margin-medium uk-panel">
        <div class="uk-card uk-card-default uk-box-shadow-medium">
            <div class="uk-card-header uk-padding-small-vertical">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <h3 class="uk-text-bold uk-margin-remove-vertical">Listing Details</h3>
                    <p></p>
                </div>
            </div>
            <div class="uk-card-body"></div>
            <div class="uk-card-footer uk-overflow-auto">
                <table class="uk-table uk-table-divider uk-table-responsive">
                    <caption class="uk-text-bold uk-width-1-1">Latest listings</caption>
                    <tbody>
                        @foreach (range(1, 6) as $item)
                            <tr>
                                <td class="uk-table-link uk-table-expand">
                                    <a href="#"
                                       class="uk-link-reset uk-text-bold">
                                        Flutter Developer
                                    </a>
                                </td>
                                <td class="uk-width-1-3">
                                    <p class="uk-text-muted">
                                        <span>Nairobi, Kenya</span>
                                        <span>&diams;</span>
                                        <span>Full-time</span>
                                    </p>
                                </td>
                                <td class="uk-table-truncate uk-text-nowrap">
                                    <p>
                                        <span>Views: </span>
                                        <span class="uk-text-bold">1,200</span>
                                    </p>
                                </td>
                                <td class="uk-table-expand">
                                    <p class="uk-flex uk-flex-middle uk-text-middle">
                                        <span>CV: </span>
                                        <meter min="0"
                                               low="20"
                                               optimum="50"
                                               high="80"
                                               max="100"
                                               value="50"
                                               class="uk-border-rounded uk-margin-small-left  ">

                                        </meter>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-dashboard-layout>
