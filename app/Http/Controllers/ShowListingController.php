<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class ShowListingController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Listing $listing): View
    {
        $listing->loadMissing('category', 'company', 'tags', 'owner:id,email');

        $relatedListings = Cache::remember(
            key: 'related-listings',
            ttl: now()->addHours(6),
            callback: fn () => $listing->relatedProducts()->get()
        );

        return view('listing.show', compact('listing', 'relatedListings'));
    }
}
