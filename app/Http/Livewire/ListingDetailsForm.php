<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Lean\LivewireAccess\WithImplicitAccess;
use Lean\LivewireAccess\BlockFrontendAccess;
use App\Http\Livewire\Concerns\AddEditListingHelpers;
use App\Http\Livewire\Concerns\FormatLocationProperty;

class ListingDetailsForm extends Component
{
    use AddEditListingHelpers;

    use FormatLocationProperty;

    use WithImplicitAccess;

    #[BlockFrontendAccess]
    public Collection $state;

    #[BlockFrontendAccess]
    public int $step = 1;

    public function mount()
    {
        if (!empty($this->state->get('listing'))) {
            $this->initialize((array) $this->state->get('listing'));
        }

        if (!empty($this->state->get('tags'))) {
            $this->tags = implode(',', (array) $this->state->get('tags'));
        }
    }


    public function submit(): void
    {
        $this->location = $this->formatLocationProperty($this->location);

        $validated = $this->validate();


        $this->state->put('listing', Arr::except($validated, 'tags'));
        $this->state->put('tags', $this->unpackTags());

        $this->emit('mergeState', $this->state);

        $this->emit('advanceToStep', ++$this->step);

        $this->resetErrorBag();
    }

    public function render(): View
    {
        return view('livewire.listing-details-form');
    }
}
