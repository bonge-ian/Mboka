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

    public User $user;

    public string $sort = 'desc';

    public ?string $status = null;

    protected $paginationTheme = 'uikit';

    public function mount(Request $request)
    {
        $this->user = $request->user();
    }

    public function render()
    {
        $listings = $this->getListingsBuilder();

        $this->applyStatusFilter($listings);
        $this->applyOrderFilter($listings);

        $listings = $listings->simplePaginate(5);

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
                value: $this->user->id
            );
    }

    protected function applyStatusFilter(Builder $query)
    {
        if (is_null($this->status)) {
            return;
        }

        $query->where(
            column: 'status',
            operator: '=',
            value: $this->status,
        );
        $this->resetPage();
    }

    protected function applyOrderFilter(Builder $query)
    {
        $query->orderBy(
            column: 'created_at',
            direction: $this->sort,
        );
    }
}
