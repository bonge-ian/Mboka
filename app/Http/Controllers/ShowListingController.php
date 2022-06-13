<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class ShowListingController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Listing $listing): View
    {
        $listing->loadMissing('category', 'company', 'tags', 'owner:id,email');

        $relatedListings = $this->getRelatedListings($listing);

        views($listing)->record();

        seo()
            ->title($listing->title)
            ->description(Str::limit($listing->overview, 50))
            ->url(route('listing.show', $listing->slug));

        return view('listing.show', compact('listing', 'relatedListings'));
    }

    protected function getRelatedListings(Listing $listing): mixed
    {
        return Cache::remember(
            key: 'related-listings',
            ttl: now()->addHours(6),
            callback: fn () => $listing->relatedProducts()->get()
        );
    }
}
