<?php

use App\Models\Category;
use function Pest\Livewire\livewire;
use App\Domain\States\ListingTypeEnum;
use App\Http\Livewire\ListingDetailsForm;
use App\Domain\States\EmployeeAvailabilityEnum;

uses()->group('listing-form');

it('requires all fields to be filled', function () {
    $c = Category::factory()->create();

    livewire(ListingDetailsForm::class, [
        'state' => collect(),
    ])
        ->set('title', 'sometile')
        ->set('perks', 'perks sdfsfsdfsdfsdf')
        ->set('overview', 'sfsfsdfsdfsd sdfsdfsf')
        ->set('experience', 'experience sdfsdfdsf')
        ->set('tags', 'tags')
        ->set('location', 'Foo, Kenya')
        ->set('apply_url', 'https://perks.com')
        ->set('category_id', $c->id)
        ->set('listing_type', ListingTypeEnum::FULLTIME->value)
        ->set('employee_availability', EmployeeAvailabilityEnum::REMOTE->value)
        ->call('submit')
        ->assertHasNoErrors();
});

it("fills the component's properties on load when state isn't empty", function () {

    $state = collect([
        'listing' => [
            'perks' => 'Some  perks',
            'title' => 'New Listing',
            'location' => 'Nairobi, Kenya',
            'overview' => 'Some overview',
            'apply_url' => 'https:://ass.com',
            'experience' => 'some experience',
            'category_id' => 2,
            'on_site_days' => null,
            'listing_type' => ListingTypeEnum::CONTRACT->value,
            'employee_availability' => EmployeeAvailabilityEnum::REMOTE->value,
        ]
    ]);

    livewire(ListingDetailsForm::class, [
        'state' => $state,
    ])
        ->assertPayloadSet('title', data_get($state, 'listing.title'));
});

it('emits the mergeState event', function () {
    $c = Category::factory()->create();

    livewire(ListingDetailsForm::class, [
        'state' => collect(),
    ])
        ->set('title', 'sometile')
        ->set('perks', 'perks sdfsfsdfsdfsdf')
        ->set('overview', 'sfsfsdfsdfsd sdfsdfsf')
        ->set('experience', 'experience sdfsdfdsf')
        ->set('tags', 'tags')
        ->set('location', 'Foo, Kenya')
        ->set('apply_url', 'https://perks.com')
        ->set('category_id', $c->id)
        ->set('listing_type', ListingTypeEnum::FULLTIME->value)
        ->set('employee_availability', EmployeeAvailabilityEnum::REMOTE->value)
        ->call('submit')
        ->assertEmitted('mergeState');
});

it('emits the advanceStep event', function () {
    $c = Category::factory()->create();

    livewire(ListingDetailsForm::class, [
        'state' => collect(),
    ])
        ->set('title', 'sometile')
        ->set('perks', 'perks sdfsfsdfsdfsdf')
        ->set('overview', 'sfsfsdfsdfsd sdfsdfsf')
        ->set('experience', 'experience sdfsdfdsf')
        ->set('tags', 'tags')
        ->set('location', 'Foo, Kenya')
        ->set('apply_url', 'https://perks.com')
        ->set('category_id', $c->id)
        ->set('listing_type', ListingTypeEnum::FULLTIME->value)
        ->set('employee_availability', EmployeeAvailabilityEnum::REMOTE->value)
        ->call('submit')
        ->assertEmitted('advanceToStep');
});
