<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Tag;
use App\Models\Listing;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Lean\LivewireAccess\WithImplicitAccess;
use Lean\LivewireAccess\BlockFrontendAccess;
use App\Http\Livewire\Concerns\FormatLocationProperty;
use App\Http\Livewire\Concerns\AddOrEditListingHelpers;

class EditListing extends Component
{
    use WithImplicitAccess;

    use AddOrEditListingHelpers;

    use FormatLocationProperty;

    public string $slug;

    #[BlockFrontendAccess]
    public array|Collection $tags_collection = [];

    #[BlockFrontendAccess]
    public Listing $listing;

    public function mount(Listing $listing)
    {
        $this->initialize($listing->toArray());

        $this->slug = data_get($listing, 'slug');

        $this->tags_collection = data_get($listing, 'tags');

        $this->tags = implode(', ', Arr::pluck(data_get($listing, 'tags'), 'name'));
    }

    public function updatedEmployeeAvailability(): void
    {
        $this->dispatchBrowserEvent('employee-availability-is-changed');
    }

    public function updateListing()
    {
        $this->location = $this->formatLocationProperty($this->location);

        $validated = $this->validate();

        $this->listing->update(Arr::except($validated, 'tags'));

        $ids = $this->capitalizeTags()->map(
            fn (string $tag) => Tag::firstOrCreate(['name' => $tag])->id
        );

        $this->listing->tags()->sync($ids);

        $this->dispatchBrowserEvent('listing-updated', [
            'message' => "Your listing has been successfully updated"
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.edit-listing');
    }
    
    protected function capitalizeTags()
    {
        return collect($this->unpackTags())
            ->map(
                fn ($tag) => ucfirst($tag)
            );
    }
}
