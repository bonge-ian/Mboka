<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Livewire\Concerns\AddOrEditListingHelpers;

class ListingDetailsForm extends Component
{
    use AddOrEditListingHelpers;

    public Collection $state;

    public int $step = 1;

    public string $perks = '';

    public string $tags = '';

    public string $title = '';

    public int $category_id = 0;

    public string $overview = '';

    public string $location = '';

    public string $apply_url = '';

    public ?int $on_site_days = null;

    public string $experience = '';

    public string $listing_type = '';

    public string $employee_availability = '';

    public function mount()
    {
        if (!empty($this->state->get('listing'))) {
            $this->fill([
                'perks' => data_get($this->state, 'listing.perks'),
                'title' => data_get($this->state, 'listing.title'),
                'location' => data_get($this->state, 'listing.location'),
                'overview' => data_get($this->state, 'listing.overview'),
                'apply_url' => data_get($this->state, 'listing.apply_url'),
                'experience' => data_get($this->state, 'listing.experience'),
                'category_id' => data_get($this->state, 'listing.category_id'),
                'on_site_days' => data_get($this->state, 'listing.on_site_days'),
                'listing_type' => data_get($this->state, 'listing.listing_type'),
                'employee_availability' => data_get($this->state, 'listing.employee_availability'),
            ]);
        }

        if (!empty($this->state->get('tags'))) {
            $this->tags = implode(',', (array) $this->state->get('tags'));
        }
    }


    public function submit(): void
    {
        $this->location = $this->formatLocationProperty();

        $validated = $this->validate();


        $this->state->put('listing', Arr::except($validated, 'tags'));
        $this->state->put('tags', $this->unpackTags());

        $this->emit('mergeState', $this->state);

        $this->emit('advanceToStep', ++$this->step);

        $this->resetErrorBag();
    }

    public function unpackTags(): array
    {
        return explode(
            separator: ',',
            string: Str::replace(', ', ',', $this->tags)
        );
    }

    public function render(): View
    {
        return view('livewire.listing-details-form');
    }

    protected function rules(): array
    {
        $rules = Arr::except(Listing::rules(), [
            'highlight_color',
            'is_highlighted',
            'is_pinned',
            'show_logo',
        ]);

        $rules['on_site_days'] = [
            'nullable',
            Rule::requiredIf(
                fn () => $this->processShowOnsiteDays($this->employee_availability)
            ),
            'numeric',
            'min:1',
            'max:5'
        ];

        $additionalRules = [
            'tags' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $splitTags = explode(
                        ',',
                        Str::replace(', ', ',', $value)
                    );

                    if (count($splitTags) > 5) {
                        $fail("Only a maximum of 5 tags is required.");
                    }
                }
            ]
        ];

        return array_merge($rules, $additionalRules);
    }
}
