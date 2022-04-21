<?php

use App\Models\Listing;
use App\Models\Category;
use Illuminate\Support\Str;

uses()->group('categorymodel');

test('creates a slug when creating a category with only a name', function () {
    $categoryName = 'category name';
    $category = Category::factory()->create([
        'name' => $categoryName
    ]);

    expect($category->slug)->toBe(Str::slug($categoryName));
});

test('a user has many listings', function () {
    $category = Category::factory()->create();

    $listings = Listing::factory()
        ->count(2)
        ->for($category, 'category')
        ->create();

    expect($category->listings()->count())->toEqual(2);
    expect($category->listings->first())->toBeInstanceOf(Listing::class);
})->group('categoryrelations');
