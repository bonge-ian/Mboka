<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Concerns;

use App\Models\Click;
use App\Models\Listing;
use CyrildeWit\EloquentViewable\View;

trait TotalClicksAndViewsCount
{
    protected function getTotalViewsCount(int $user_id): int
    {
        return View::query()
            ->whereMorphRelation(
                relation: 'viewable',
                types: Listing::class,
                column: 'user_id',
                operator: '=',
                value: $user_id
            )->count();
    }

    protected function getTotalClicksCount(int $user_id): int
    {
        return Click::query()
            ->whereRelation(
                relation: 'listing',
                column: 'user_id',
                operator: '=',
                value: $user_id
            )->count();
    }
}
