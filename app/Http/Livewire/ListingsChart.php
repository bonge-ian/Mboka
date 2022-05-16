<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Click;
use App\Models\Listing;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Database\Query\Expression;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Asantibanez\LivewireCharts\Models\BaseChartModel;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class ListingsChart extends Component
{
    public int $user_id;

    public bool $readyToLoad = false;

    public string $chart_type = '';

    protected array $colors = [
        'clicks' => '#1991ee',
        'views' => '#0c273a',
    ];

    protected ?BaseChartModel $chart_model = null;

    public function mount(int $user_id, string $chart_type)
    {
        $this->user_id = $user_id;
        $this->chart_type = $chart_type;

        // $this->setChartModel();
    }

    public function loadChart()
    {
        $this->setChartModel();
        $this->readyToLoad = true;
    }

    public function render()
    {
        $chart = $this->readyToLoad
            ? $this->populateChart()
            : null;

        return view('livewire.listings-chart', compact('chart'));
    }

    protected function getClicksCount(
        int $user_id,
        ?Carbon $start_date = null,
        ?Carbon $end_date = null
    ): Collection {
        return Click::query()
            ->select($this->setSelectQuery('created_at'))
            ->whereRelation(
                relation: 'listing',
                column: 'user_id',
                operator: '=',
                value: $user_id
            )
            ->groupByRaw('c_date, c_day')
            ->havingBetween('c_date', [
                $start_date ?? now()->subMonth(),
                $end_date ?? now()
            ])
            ->get()
            ->groupBy('c_date')
            ->map(fn ($click) => $click->sum('total'));
    }

    protected function getViewsCount(
        int $user_id,
        ?Carbon $start_date = null,
        ?Carbon $end_date = null
    ): Collection {
        return  View::query()
            ->select($this->setSelectQuery('viewed_at'))
            ->whereHasMorph(
                relation: 'viewable',
                types: Listing::class,
                callback: fn (Builder $query) => $query->where(
                    column: 'user_id',
                    operator: '=',
                    value: $user_id
                )
            )
            ->groupByRaw('c_date, c_day')
            ->havingBetween('c_date', [
                $start_date ?? now()->subMonth(),
                $end_date ?? now()
            ])
            ->get()
            ->groupBy('c_date')
            ->map(fn ($click) => $click->sum('total'));
    }

    protected function populateChart()
    {
        $clicks = $this->getClicksCount(
            user_id: $this->user_id,
            start_date: now()->subDays(25),
            end_date: now()
        );

        $views = $this->getViewsCount(
            user_id: $this->user_id,
            start_date: now()->subDays(25),
            end_date: now()
        );

        $chart = $this->populateChartData(
            clicks: $clicks,
            views: $views,
        );

        return $chart->setXAxisCategories($this->setXAxisValues($clicks->keys(), $views->keys()));
    }

    protected function populateChartData(Collection $clicks, Collection $views)
    {
        $this->chart_model = $clicks->reduce(
            callback: function ($chart_model, $data) use ($clicks) {
                $key = $clicks->search($data);

                return $chart_model->addSeriesPoint(
                    'Clicks',
                    $key,
                    $data
                );
            },
            initial: $this->chart_model
        );

        $this->chart_model = $views->reduce(
            callback: function ($chart_model, $data) use ($views) {
                $key = $views->search($data);

                return $chart_model->addSeriesPoint(
                    'Views',
                    $key,
                    $data
                );
            },
            initial: $this->chart_model
        );

        return $this->chart_model;
    }

    protected function setXAxisValues(Collection $clicks, Collection $views): array
    {
        $values = $clicks->concat($views)->sort()->unique();

        return $values
            ->map(
                fn ($date) => Carbon::parse($date)->format("dS, M")
            )->values()->toArray();
    }

    protected function setSelectQuery(string $datetime_column): Expression
    {
        return DB::raw(
            sprintf(
                "DATE(%s) as c_date, DAYOFMONTH(%s) as c_day, COUNT(*) AS total",
                $datetime_column,
                $datetime_column
            )
        );
    }

    protected function setChartModel()
    {
        $this->chart_model = match ($this->chart_type) {
            'multiline' => LivewireCharts::multiLineChartModel(),
            'multicolumn' => LivewireCharts::multiColumnChartModel()
        };

        $this->chart_model->setTitle('Clicks and Views Analysis')
            ->withLegend()
            ->multiLine()
            ->withoutDataLabels()
            ->setAnimated(true)
            ->setColors(array_values($this->colors));
    }
}
