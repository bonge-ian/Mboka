<x-app-layout title="Home">
    @push('scripts')
        <script src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    @endpush
    <header class="uk-background-cover uk-background-image uk-section uk-section-large hero  uk-background-bottom-center uk-background-norepeat"
            uk-height-viewport="expand: true;"
            uk-img="loading: lazy">
        <div class="uk-container uk-container-xsmall">
            <div class="uk-width-1-1 uk-tile uk-flex uk-flex-center uk-flex-middle uk-flex-column uk-text-center">
                <h1 class="uk-heading-small uk-text-bold">
                    Get the <span class="uk-text-background">Right Job</span>
                    <br class="uk-visible@m">
                    You Deserve!
                </h1>
                <p class="uk-text-lead">
                    Veracious and precise web platform to get your dream job.
                    No superfluous sign-ups required.
                </p>
                <a href="#"
                   class="uk-button uk-button-large uk-border-rounded uk-button-primary uk-text-uppercase">
                    Start Now.
                </a>
            </div>
        </div>
    </header>

    <article class="uk-section uk-section-large uk-section-default">
        <div class="uk-container">
            <livewire:listings-index />
        </div>
    </article>
</x-app-layout>
