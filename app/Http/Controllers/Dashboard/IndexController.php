<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Concerns\TotalClicksAndViewsCount;

class IndexController extends Controller
{
    use TotalClicksAndViewsCount;

    protected User $user;

    public function __invoke(Request $request): View
    {
        $this->user = $request->user();

        $views_count = $this->getTotalViewsCount($this->user->id);
        $clicks_count = $this->getTotalClicksCount($this->user->id);
        $listings = $this->getLatestTenListings();
        $user = $this->user;

        return view('dashboard.index', compact('user','listings', 'clicks_count', 'views_count'));
    }

    public function getLatestTenListings()
    {
        return $this->user
            ->listings()
            ->select([
                'slug',
                'title',
                'status',
                'location',
                'listing_type'
            ])
            ->withCount([
                'clicks',
                'views'
            ])
            ->limit(10)
            ->latest()
            ->get();
    }
}
