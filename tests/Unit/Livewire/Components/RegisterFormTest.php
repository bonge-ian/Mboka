<?php

use App\Http\Livewire\RegisterForm;
use function Pest\Livewire\livewire;

uses()->group('register-form');

it("fills the component's properties on load when state isn't empty", function () {

    $state = collect([
        'customer' => [
            'name' => 'Donar Kill',
            'email' => 'email@gmail.com',
            'password' => 'Password',
        ]
    ]);

    livewire(RegisterForm::class, [
        'state' => $state
    ])
        ->assertPayloadSet('name', 'Donar Kill');
});

it("requires all fields to be filled", function () {

    $state = collect([
        'customer' => [
            'name' => 'Donar Kill',
            'email' => 'email@gmail.com',
            'password' => 'Password',
        ]
    ]);

    livewire(RegisterForm::class, [
        'state' => $state,
        'step' => 4
    ])
        ->set('password_confirmation', data_get($state, 'customer.password'))
        ->call('submit')
        ->assertHasNoErrors();
});

it("emits advanceToStep event", function () {

    $state = collect([
        'customer' => [
            'name' => 'Donar Kill',
            'email' => 'email@gmail.com',
            'password' => 'Password',
        ]
    ]);

    livewire(RegisterForm::class, [
        'state' => $state,
        'step' => 4
    ])
        ->set('password_confirmation', data_get($state, 'customer.password'))
        ->call('submit')
        ->assertEmitted('advanceToStep');
});

it("emits mergeState event", function () {

    $state = collect([
        'customer' => [
            'name' => 'Donar Kill',
            'email' => 'email@gmail.com',
            'password' => 'Password',
        ]
    ]);

    livewire(RegisterForm::class, [
        'state' => $state,
        'step' => 4
    ])
        ->set('password_confirmation', data_get($state, 'customer.password'))
        ->call('submit')
        ->assertEmitted('mergeState');
});

it("requires fullname to be entered", function () {

    $state = collect([
        'customer' => [
            'name' => 'Donar',
            'email' => 'email@gmail.com',
            'password' => 'Password',
        ]
    ]);

    livewire(RegisterForm::class, [
        'state' => $state,
        'step' => 4
    ])
        ->set('password_confirmation', data_get($state, 'customer.password'))
        ->call('submit')
        ->assertHasErrors('name');
});
