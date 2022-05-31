<?php

use Illuminate\Http\UploadedFile;

use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\CompanyDetailsForm;

uses()->group('company-form');

it("fills the component's properties on load when state isn't emptyties on load", function () {

    $state = collect([
        'company' => [
            'bio' => 'Companys bio',
            'logo' =>   'dfsdfsf.png',
            'name' => 'company',
            'website' => 'https:://wee.com',
            'headquarters' => 'foo',
        ]
    ]);

    livewire(CompanyDetailsForm::class, [
        'state' => $state,
    ])
        ->assertPayloadSet('name', data_get($state, 'company.name'));
});

it("requires all fields to be filled", function () {

    Storage::fake('companies/assets');

    $file = UploadedFile::fake()->image('somefile.png');

    livewire(CompanyDetailsForm::class, [
        'state' => collect()
    ])
        ->set('bio', 'my bio linkyo')
        ->set('name', 'apple inc')
        ->set('website', 'https://dfd.com')
        ->set('headquarters', 'Foo, Kenya')
        ->set('logo', $file)
        ->call('submit')
        ->assertHasNoErrors();
});

it("company logo is uploaded", function () {

    Storage::fake('public');

    $file = UploadedFile::fake()->image('avatar.png');

    livewire(CompanyDetailsForm::class, [
        'state' => collect(),
        'isAlreadyUploaded' => false
    ])
        ->set('bio', 'my bio linkyo')
        ->set('name', 'apple inc')
        ->set('website', 'https://dfd.com')
        ->set('headquarters', 'Foo, Kenya')
        ->set('isAlreadyUploaded', false)
        ->set('logo', $file)
        ->call('submit');

    Storage::disk('public')->assertExists('companies/assets');
});

it("emits advanceToStep event", function () {

    Storage::fake('companies/assets');

    $file = UploadedFile::fake()->image('somefile.png');

    livewire(CompanyDetailsForm::class, [
        'state' => collect()
    ])
        ->set('bio', 'my bio linkyo')
        ->set('name', 'apple inc')
        ->set('website', 'https://dfd.com')
        ->set('headquarters', 'Foo, Kenya')
        ->set('logo', $file)
        ->call('submit')
        ->assertEmitted('advanceToStep');
});

it("emits mergeState event", function () {

    Storage::fake('companies/assets');

    $file = UploadedFile::fake()->image('somefile.png');

    livewire(CompanyDetailsForm::class, [
        'state' => collect()
    ])
        ->set('bio', 'my bio linkyo')
        ->set('name', 'apple inc')
        ->set('website', 'https://dfd.com')
        ->set('headquarters', 'Foo, Kenya')
        ->set('logo', $file)
        ->call('submit')
        ->assertEmitted('mergeState');
});
