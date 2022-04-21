<?php

use App\Models\Tag;
use App\Models\Listing;
use Illuminate\Support\Str;

uses()->group('tagmodel');

test('creates a slug when creating a tag with only a name', function () {
    $tagName = 'tag name';

    $tag = Tag::factory()->create([
        'name' => $tagName
    ]);

    expect($tag->slug)->toBe(Str::slug($tagName));
});

test('a tag has many listings', function () {
    $tag = Tag::factory()->create();

    $listings = Listing::factory()->count(2)->create();

    $tag->listings()->attach($listings);

    expect($tag->listings()->count())->toEqual(2);
    expect($tag->listings()->first())->toBeInstanceOf(Listing::class);
})->group('tagrelations');
