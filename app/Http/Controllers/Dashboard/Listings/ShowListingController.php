<?php

namespace App\Http\Controllers\Dashboard\Listings;

use App\Models\Listing;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowListingController extends Controller
{
    public function __invoke(Request $request, Listing $listing): View
    {
        $listing->loadMissing([
            'tags:id,name',
            'company:id,logo',
            'category:id,name,slug',
            'payments' => fn($query) => $query->orderBy('paid_at', 'desc')
        ])
        ->loadCount(['views', 'clicks']);

        $user = $request->user();

        return view('dashboard.listings.show', compact('listing', 'user'));
    }
}
