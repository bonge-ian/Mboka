<?php

use App\Models\User;
use App\Models\Listing;

uses()->group('usermodel');

test('a user has many listings', function () {
    $user = User::factory()->create();

    $listings = Listing::factory()
        ->count(2)
        ->for($user, 'owner')
        ->create();

    expect($user->listings()->count())->toEqual(2);
    expect($user->listings->first())->toBeInstanceOf(Listing::class);
})->group('userrelations');
