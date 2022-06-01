<?php

namespace App\Http\Livewire\Dashboard;

use Auth;
use App\Models\User;
use App\Models\Listing;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ManageListings extends Component
{
    use WithPagination;

    public int $user_id;

    public string $sort = 'desc';

    public ?string $status = null;

    public function paginationSimpleView()
    {
        return 'vendor.livewire.simple-uikit';
    }

    public function mount()
    {
        $this->user_id = auth()->id();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $listings = $this->getListingsBuilder();

        $this->applyStatusFilter($listings);
        $this->applyOrderFilter($listings);

        $listings = $listings->simplePaginate();

        return view('livewire.dashboard.manage-listings', compact('listings'))
            ->layout('layouts.dashboard', [
                'title' => 'Manage Listings',
                'page_title' => 'Manage Listings'
            ]);
    }

    protected function getListingsBuilder(): Builder
    {
        return Listing::query()
            ->select([
                'id',
                'slug',
                'title',
                'status',
                'location',
                'created_at',
                'company_id',
                'listing_type',
            ])
            ->with('company:id,name,website')
            ->withCount('clicks')
            ->where(
                column: 'user_id',
                operator: '=',
                value: $this->user_id
            );
    }

    protected function applyStatusFilter(Builder $query)
    {
        $query->when(
            value: !is_null($this->status),
            callback: fn (Builder $query) => $query->where(
                column: 'status',
                operator: '=',
                value: $this->status,
            )
        );
    }

    protected function applyOrderFilter(Builder $query)
    {
        $query->orderBy(
            column: 'created_at',
            direction: $this->sort,
        );
    }
}
