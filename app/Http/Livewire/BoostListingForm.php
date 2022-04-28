<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;
use Illuminate\Support\Arr;
use App\Domain\Helpers\Prices;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class BoostListingForm extends Component
{
    public int $step = 3;

    public Collection $state;

    public ?bool $is_pinned = null;

    public ?bool $show_logo = null;

    public ?bool $is_highlighted = null;

    public ?string $highlight_color = null;

    protected $messages = [
        'highlight_color.required_with' => 'You must pick a highlight color for us to highlight your listing'
    ];

    public function mount(): void
    {
        if (!empty($this->state->get('enhancements'))) {
            $this->fill([
                'is_pinned' => data_get($this->state, 'enhancements.is_pinned'),
                'show_logo' => data_get($this->state, 'enhancements.show_logo'),
                'is_highlighted' => data_get($this->state, 'enhancements.is_highlighted'),
                'highlight_color' => data_get($this->state, 'enhancements.highlight_color'),
            ]);
        }
    }

    public function getHighlightPriceProperty(): string
    {
        return Prices::highlight()->formatted();
    }

    public function getPinnedPriceProperty(): string
    {
        return Prices::pinned()->formatted();
    }

    public function getShowLogoPriceProperty(): string
    {
        return Prices::showLogo()->formatted();
    }

    public function submit(): void
    {
        $validated = $this->validate();

        $this->state->put('enhancements', collect($validated)->filter(
            fn ($item) => !is_null($item)
        )->toArray());

        $this->emitUp('mergeState', $this->state);

        $this->emitUp('advanceToStep', 4);
    }


    protected function rules(): array
    {
        return Arr::only(Listing::rules(), [
            'is_highlighted',
            'is_pinned',
            'show_logo',
            'highlight_color'
        ]);
    }

    public function render(): View
    {
        return view('livewire.boost-listing-form');
    }
}
