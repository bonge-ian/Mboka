<footer class="uk-section uk-section-large uk-section-secondary uk-padding-remove-bottom">
    <div class="uk-container">
        <div class="uk-flex uk-flex-center uk-flex-middle uk-flex-column uk-width-1-1 uk-text-center">
            <h2 class="uk-heading-small uk-text-bold">Ready to post a job?</h2>
            <p class="uk-text-lead">Get hold of a vast pool of adept job seekers. <br> Click below to get started</p>
            <a href="{{ route('listing.create') }}"
               class="uk-button uk-button-large uk-button-primary uk-border-rounded">
                Post a job for {{ App\Domain\Helpers\Prices::default()->formatted() }}
            </a>
        </div>

        <hr class="uk-margin-medium">
        <div class="uk-grid uk-margin-medium-bottom"
             uk-grid>
            <div class="uk-grid-item-match uk-flex-middle uk-width-1-2@m">
                <div class="uk-panel uk-width-1-1">


                    <div class="uk-margin-remove-vertical uk-text-right@m uk-text-center">
                        <div class="uk-child-width-auto uk-grid-small uk-flex-inline uk-grid"
                             uk-grid>

                            <div>
                                <a class="uk-icon-link "
                                   href="https://www.facebook.com/bonge.inc/"
                                   target="_blank"
                                   id="Bonge Inc. Facebook Page"
                                   rel="noreferrer">
                                    <span uk-icon="icon: facebook; width: 16; height: 16;"
                                          class="uk-icon">
                                    </span>
                                </a>
                            </div>
                            <div>
                                <a class="uk-icon-link"
                                   href="https://www.github.com/bonge-ian"
                                   target="_blank"
                                   id="Bonge's Github Page"
                                   rel="noreferrer">
                                    <span uk-icon="icon: github; width: 16; height: 16;"
                                          class="uk-icon">
                                    </span>
                                </a>
                            </div>
                            <div>
                                <a class="uk-icon-link"
                                   href="https://www.bonge-inc.co.ke"
                                   target="_blank"
                                   id="Bonge Inc. Website Link"
                                   rel="noreferrer">
                                    <span uk-icon="icon:  world; width: 16; height: 16;"
                                          class="uk-icon">
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="uk-grid-item-match uk-flex-middle uk-width-1-2@m uk-flex-first@m uk-first-column">
                <div class="uk-panel uk-width-1-1">

                    <div class="uk-panel uk-text-small uk-text-muted uk-margin uk-text-left@m uk-text-center">©
                        <script>
                            document.currentScript.insertAdjacentHTML('afterend', '<time datetime="' + new Date().toJSON() + '">' + new Intl
                                .DateTimeFormat(document.documentElement.lang, {
                                    year: 'numeric'
                                }).format() + '</time>');
                        </script>
                        <time></time> Mboka.
                        All rights reserved. Cobbled together by <a href="https://www.bonge-inc.co.ke/"
                           target="_blank">Bonge Inc</a>.
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
