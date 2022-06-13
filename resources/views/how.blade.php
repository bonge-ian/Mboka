<x-default-layout title="How It Works">
    @seo(['title' => 'How It Works.'])
    @seo(['description' => 'Get to know how our web platform works. We have a detailed overview of our robust job listing application, catered for both a job seeker and an employer. '])
    @seo(['url' =>route('how-it-works')])
    <section class="uk-section uk-section-large">
        <header class="uk-width-1-1 uk-text-center">
            <h1 class="uk-heading-medium uk-text-bold uk-text-background">
                How it works
            </h1>
            <hr class="uk-divider-small">
        </header>
    </section>

    <section class="uk-section uk-section-large create-listing-procedure uk-background-image uk-background-cover">
        <div class="uk-container">
            <div class="uk-grid uk-grid-large uk-child-width-1-1 uk-child-width-1-2@m"
                 uk-grid>
                <div></div>
                <div>
                    <aside class="uk-panel uk-tile uk-tile-large">
                        <h2 class="uk-heading-small uk-text-bold uk-text-secondary">
                            Easy steps for you to create your listing
                        </h2>
                        <hr class="uk-divider-small">
                        <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                             uk-grid>
                            <div>
                                <x-step-card step="01"
                                             step_color="uk-text-success"
                                             title="Tell us more about your listing"
                                             overview="Fill in the nitty gritties of what you're looking for. Tell the job seekers of what skills and expertise your organisation is looking for." />
                            </div>
                            <div>
                                <x-step-card step="02"
                                             step_color="uk-text-danger"
                                             title="Tell us more about your company"
                                             overview="Give us some details about your company. It's important your audience knows a bit about your company." />
                            </div>
                            <div>
                                <x-step-card step="03"
                                             step_color="uk-text-secondary"
                                             title="Stand out from the rest"
                                             overview="Boost your listing to capture the attention of the job seeker. This is important to get more leads" />
                            </div>
                            <div>
                                <x-step-card step="04"
                                             step_color="uk-text-primary"
                                             title="Register with us"
                                             overview="Create an account with us. You get the ability to check how your listing performs."
                                             meta="You can skip this step if you have an account with us" />
                            </div>
                            <div>
                                <x-step-card step="05"
                                             step_color="uk-text-success"
                                             title="Payment"
                                             overview="We are finally there! Bring your listing to life after having done your payment. All payments are secured." />
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

    </section>

    <section
             class="uk-section uk-section-large view-listing-procedure uk-background-image uk-background-cover uk-background-center-center">
        <div class="uk-container">
            <div class="uk-grid uk-grid-large uk-child-width-1-1 uk-child-width-1-2@m"
                 uk-grid>
                <div>
                    <aside class="uk-panel uk-tile uk-tile-large">
                        <h2 class="uk-heading-small uk-text-bold uk-text-primary">
                            Easy steps for you to find your dream job and apply for.
                        </h2>
                        <hr class="uk-divider-small">
                        <div class="uk-grid uk-grid-medium uk-child-width-1-1"
                             uk-grid>
                            <div>
                                <x-step-card step="01"
                                             step_color="uk-text-success"
                                             title="Browse through our rich catalogue"
                                             overview="Search for your perfect job. Peruse through our catalogue and use serch and filters to help you find your dream job" />
                            </div>
                            <div>
                                <x-step-card step="02"
                                             step_color="uk-text-danger"
                                             title="View the Job Details"
                                             overview="Go through the job details thoroughly. It's important to check if your skillset match what the employer is looking for." />
                            </div>
                            <div>
                                <x-step-card step="03"
                                             step_color="uk-text-secondary"
                                             title="Good luck!"
                                             overview="Apply for the job. Brush up your resume and apply." />
                            </div>

                        </div>
                    </aside>
                </div>
                <div></div>
            </div>
        </div>
    </section>

</x-default-layout>
