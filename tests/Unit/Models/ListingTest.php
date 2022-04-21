<?php

use App\Models\Tag;
use App\Models\User;
use App\Models\Company;
use App\Models\Listing;
use App\Models\Category;

uses()->group('listingmodel');

test('a slug with a key is generated while creating a listing', function () {
    $listing = Listing::factory()->create();

    expect($listing->slug)->toBeString();
});

test('a listing belongs to a category', function () {
    $category = Category::factory()->create();
    $listing = Listing::factory()->for($category, 'category')->create();

    expect($listing->category()->first())->toBeInstanceOf(Category::class);
})->group('listingrelations');

test('a listing belongs to a company', function () {
    $company = Company::factory()->create();
    $listing = Listing::factory()->for($company, 'company')->create();

    expect($listing->company()->first())->toBeInstanceOf(Company::class);
})->group('listingrelations');

test('a listing belongs to a user', function () {
    $user = User::factory()->create();
    $listing = Listing::factory()->for($user, 'owner')->create();

    expect($listing->owner()->first())->toBeInstanceOf(User::class);
})->group('listingrelations');

test('a listing has many tags', function () {
    $tags = Tag::factory()->count(2)->create();

    $listing = Listing::factory()->create();

    $listing->tags()->attach($tags);

    expect($listing->tags()->count())->toEqual(2);
    expect($listing->tags()->first())->toBeInstanceOf(Tag::class);
})->group('listingrelations');
