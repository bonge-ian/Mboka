<x-default-layout title="About Us">
    @seo(['title' => 'About Us'])
    @seo(['description' => 'Acquaint yourselves with what we stand for. Get to know more about the only web job platform that aims to easily connect job seekers and employers together '])
    @seo(['url' => route('about-us')])

    <section class="uk-section uk-section-large uk-section-default">
        <div class="uk-container uk-container-large">
            <header class="uk-width-1-1 uk-margin-large-bottom">
                <div
                     class="uk-container uk-container-small uk-flex uk-flex-center uk-flex-middle uk-flex-column uk-text-center">
                    <h3 class="uk-text-secondary uk-margin-remove-bottom uk-text-bold">About the company</h3>
                    <hr class="uk-divider-small">
                    <h1 class="uk-text-bold uk-text-background">
                        More easier to find a job with our platform
                    </h1>
                    <p class="uk-text-lead">
                        We focus on the <span class="uk-text-success uk-text-bold">details</span> of everything we do.
                        We aim to <span class="uk-text-success uk-text-bold">minimize</span> the hassle of applying for
                        jobs for job seekers.
                        We also aim to give employers an <span class="uk-text-success uk-text-bold">straight-forward,
                            simple</span> process of creating a job
                        listing. We take <span class="uk-text-primary uk-text-bold">pride</span> in this.
                    </p>
                </div>

            </header>

            <div class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section uk-section-xlarge uk-background-primary uk-background-blend-luminosity"
                 data-src="{{ asset('storage/assets/img/connect.jpg') }}"
                 data-srcset="{{ asset('storage/assets/img/connect-small.jpg') }} 650w,{{ asset('storage/assets/img/connect-small.jpg') }} 1300w,{{ asset('storage/assets/img/connect-large.jpg') }} 1600w"
                 data-sizes="(max-aspect-ratio: 1920/1080) 300vh"
                 uk-img>

            </div>
        </div>
    </section>

    <section class="uk-section uk-section-large uk-section-default">
        <div class="uk-container">
            <div
                 class="uk-width-1-1 uk-tile uk-tile-large uk-tile-primary uk-border-rounded uk-flex-center uk-flex-middle uk-text-center uk-flex-column">
                <h2 class="uk-text-bold uk-heading-small uk-text-capitalize">
                    Any questions left?
                </h2>
                <p class="uk-text-lead">
                    Still curious or have any unanswered questions left. Well, worry not. Feel free to
                    <a href="mailto:info@bonge-inc.co.ke">contact us</a>
                </p>
                <a href="mailto:info@bonge-inc.co.ke"
                   class="uk-button uk-button-large uk-border-rounded uk-button-secondary uk-box-shadow-none uk-text-uppercase">
                    Give us a shout out!
                </a>
            </div>
        </div>
    </section>
</x-default-layout>
