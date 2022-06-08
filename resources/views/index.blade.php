<x-app-layout title="Home">
    @push('scripts')
        <script src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    @endpush
    {{-- <header></header> --}}

    <article class="uk-section uk-section-large uk-section-default">
        <div class="uk-container">
            <livewire:listings-index />
        </div>
    </article>
</x-app-layout>
