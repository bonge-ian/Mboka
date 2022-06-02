<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Click;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Domain\Helpers\Money;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Dashboard\Concerns\TotalExpenditure;
use App\Http\Controllers\Dashboard\Concerns\TotalClicksAndViewsCount;

class AnalyticsController extends Controller
{
    use TotalExpenditure;

    use TotalClicksAndViewsCount;

    protected User $user;

    public function __invoke(Request $request)
    {
        $this->user = $request->user();

        $user = $this->user;
        $views_count = $this->getTotalViewsCount($this->user->id);
        $clicks_count = $this->getTotalClicksCount($this->user->id);
        $total_expenditure = $this->getTotalExpenditure($this->user->id);
        $top_clicks_grouped_by_countries = $this->getTopClicksGroupedByCountries();

        return view(
            view: 'dashboard.analytics',
            data: compact(
                'user',
                'views_count',
                'clicks_count',
                'total_expenditure',
                'top_clicks_grouped_by_countries',
            )
        );
    }

    protected function getTopClicksGroupedByCountries(): Collection
    {
        return Click::query()
            ->select('country', DB::raw('COUNT(*) AS total'))
            ->whereRelation(
                relation: 'listing',
                column: 'user_id',
                operator: '=',
                value: $this->user->id
            )->groupBy('country')
            ->orderBy(
                column: 'total',
                direction: 'desc'
            )->limit(10)
            ->get();
    }
}
