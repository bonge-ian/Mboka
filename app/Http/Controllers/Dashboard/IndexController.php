<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Click;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CyrildeWit\EloquentViewable\View;
use Illuminate\View\View as BladeView;

class IndexController extends Controller
{
    protected User $user;

    public function __invoke(Request $request): BladeView
    {
        $this->user = $request->user();

        $views_count = $this->getTotalViewsCount();
        $clicks_count = $this->getTotalClicksCount();
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

    protected function getTotalViewsCount(): int
    {
        return View::query()
            ->whereMorphRelation(
                relation: 'viewable',
                types: Listing::class,
                column: 'user_id',
                operator: '=',
                value: $this->user->id
            )->count();
    }

    protected function getTotalClicksCount(): int
    {
        return Click::query()
            ->whereRelation(
                relation: 'listing',
                column: 'user_id',
                operator: '=',
                value: $this->user->id
            )->count();
    }
}
