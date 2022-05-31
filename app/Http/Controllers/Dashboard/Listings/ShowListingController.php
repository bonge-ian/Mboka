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
            'category:id,name,slug',
            'company:id,logo',
            'payments:id,code,amount,status,payment_method',
            'tags:id,name'
        ])->loadCount(['views', 'clicks']);

        $user = $request->user();

        return view('dashboard.listings.show', compact('listing', 'user'));
    }
}
