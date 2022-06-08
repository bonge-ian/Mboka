<?php

namespace App\Http\Livewire;

use Cache;
use App\Models\Listing;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Pagination\Cursor;
use Illuminate\Support\Collection;
use App\Domain\States\ListingStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Builder as ScoutBuilder;

class ListingsIndex extends Component
{
    use WithPagination;

    public int $per_page = 20;

    public string $cursor = '';

    public string $search = '';

    public ?string $next_cursor = null;

    public Collection $category_filters;

    protected $listeners = [
        'filterByCategory'
    ];

    protected $queryString = [
        'cursor' => [
            'except' => ''
        ]
    ];

    public function mount()
    {
        $this->category_filters = collect();
    }

    public function filterByCategory(int $category_filter)
    {
        if ($this->category_filters->contains($category_filter)) {
            $this->category_filters->forget($this->category_filters->search($category_filter));
        } else {
            $this->category_filters->push($category_filter);

            $this->resetPage();
        }
    }

    public function getPopularCategoriesProperty()
    {
        return Cache::remember(
            key: 'popular-categories',
            ttl: now()->addDay(),
            callback: fn () => Category::query()
                ->select(['id', 'name'])
                ->withCount('listings')
                ->having(
                    column: 'listings_count',
                    operator: '>',
                    value: 10
                )
                ->orderByDesc('listings_count')

                ->take(10)
                ->get()
        );
    }

    public function loadMore(string|int $data)
    {
        if ($current_page = (int) $data) {
            $this->page = (int) $current_page++;
        } else {
            $this->next_cursor = (string) $data;
        }
        $this->per_page += 20;
    }

    public function searchListing()
    {
        $this->resetPage();
    }

    public function render()
    {
        $builder = $this->prepareListingsBuilder();

        $this->applyCategoryFilter($builder);

        $builder->orderBy('is_pinned', 'desc')->orderBy('created_at', 'desc');

        if ($builder instanceof ScoutBuilder) {
            $listings = $builder->paginate(
                perPage: $this->per_page,
                pageName: 'page',
                page: $this->page
            );
            $pagination_type = 'length_aware';
        } else {
            $listings = $builder->orderBy('id', 'desc')->cursorPaginate(
                perPage: $this->per_page,
                columns: ['*'],
                cursorName: 'cursor',
                cursor: Cursor::fromEncoded($this->next_cursor)
            );

            $pagination_type = 'cursor';
        }
        return view('livewire.listings-index', compact('listings', 'pagination_type'));
    }

    protected function applyCategoryFilter(Builder|ScoutBuilder $builder)
    {
        if ($this->category_filters->isEmpty()) {
            return;
        }

        if ($builder instanceof ScoutBuilder) {
            $builder->whereIn(
                field: 'category_id',
                values: $this->category_filters->toArray()
            );
        } else {
            $builder->whereIn(
                column: 'category_id',
                values: $this->category_filters
            );
        }
    }

    protected function applySearchFilter(): ScoutBuilder
    {
        return Listing::search(
            query: $this->search,
            // callback: fn (Builder $builder) => $builder->select($this->requiredListingAttributes())
            //     ->with($this->requiredListingRelationships())
        )->where(
            field: 'status',
            value: ListingStatusEnum::ACTIVE
        )
            ->query(
                fn (Builder $builder) => $builder->select($this->requiredListingAttributes())
                    ->with($this->requiredListingRelationships())
            );
    }

    protected function prepareListingsBuilder()
    {
        return ($this->search) ? $this->applySearchFilter() : $this->applyListingsBuilder();
    }

    protected function applyListingsBuilder()
    {
        return Listing::query()
            ->select($this->requiredListingAttributes())
            ->with($this->requiredListingRelationships())
            ->isActive()
            ->where(
                column: 'created_at',
                operator: '>=',
                value: now()->subMonth(2)
            );
    }

    protected function requiredListingRelationships(): array
    {
        return [
            'tags:id,name',
            'category:id,name',
            'company:id,name,logo',
        ];
    }

    protected function requiredListingAttributes(): array
    {
        return [
            'id',
            'slug',
            'title',
            'status',
            'overview',
            'location',
            'is_pinned',
            'created_at',
            'listing_type',
            'company_id',
            'category_id',
            'apply_url',
            'show_logo',
            'is_highlighted',
            'highlight_color',
            'employee_availability'
        ];
    }
}
