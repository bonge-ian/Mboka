<?php


use function Pest\Livewire\livewire;

use App\Http\Livewire\BoostListingForm;

uses()->group('boost-listing');

it("fills the component's properties on load when state isn't empty", function () {

    $state = collect([
        'enhancements' => [
            'is_pinned' => true,
        ]
    ]);

    livewire(BoostListingForm::class, [
        'state' => $state,
    ])
        ->assertSet('is_pinned', data_get($state, 'enhancements.is_pinned'));
});

it("emits advanceToStep event", function () {

    livewire(BoostListingForm::class, [
        'state' => collect()
    ])
        ->set('show_logo', true)
        ->call('submit')
        ->assertEmitted('advanceToStep');
});

it("emits mergeState event", function () {

    livewire(BoostListingForm::class, [
        'state' => collect()
    ])
        ->set('show_logo', true)
        ->call('submit')
        ->assertEmitted('mergeState');
});

it("requires highlight color to be set when is_highlighted is set to true", function () {

    livewire(BoostListingForm::class, [
        'state' => collect()
    ])
        ->set('is_highlighted', true)
        ->call('submit')
        ->assertHasErrors('highlight_color');
});
