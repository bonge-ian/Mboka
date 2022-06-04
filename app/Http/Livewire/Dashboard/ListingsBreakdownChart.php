<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Listing;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Concerns\ChartSetup;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class ListingsBreakdownChart extends Component
{
    use ChartSetup;

    protected array $colors = [
        'closed' => '#ffcd19',
        'active' => '#19eea5',
        'pending' => '#747a96'
    ];

    public function render()
    {
        $chart = $this->readyToLoad
            ? $this->populateChart()
            : null;

        return view('livewire.dashboard.listings-breakdown-chart', compact('chart'));
    }

    protected function getListingsCount()
    {
        return Listing::query()
            ->select(
                DB::raw(
                    "status, COUNT(*) AS total",
                )
            )
            ->where(
                column: 'user_id',
                operator: '=',
                value: $this->user_id
            )
            ->groupBy(
                groups: 'status'
            )
            ->orderBy(
                column: 'total',
                direction: 'desc'
            )->get();
    }

    protected function populateChart()
    {
        $listings_count =  $this->getListingsCount();

        if ($listings_count->isEmpty()) {
            return false;
        }

        return $this->chart_model = $listings_count
            ->reduce(
                function (PieChartModel $pie_chart_model, Listing $listing) {
                    $type = $listing->status->value;

                    return $pie_chart_model->addSlice(
                        title: $type,
                        value: $listing->total,
                        color: $this->colors[$type]
                    );
                },
                $this->chart_model
            );
    }

    protected function setChartModel()
    {
        $this->chart_model = (new PieChartModel())
            ->setTitle('Listing Breakdown')
            ->withLegend()
            ->setType('donut')
            ->withDataLabels()
            ->setAnimated(true)
            ->legendPositionBottom()
            ->legendHorizontallyAlignedCenter()
            ->setColors(array_values($this->colors));
    }
}
