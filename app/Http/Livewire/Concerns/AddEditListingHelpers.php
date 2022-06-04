<?php

declare(strict_types=1);

namespace App\Http\Livewire\Concerns;

use App\Models\Listing;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use App\Domain\States\ListingTypeEnum;
use App\Http\Livewire\Dashboard\EditListing;
use App\Domain\States\EmployeeAvailabilityEnum;

trait AddEditListingHelpers
{
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

    public function initialize(array|Collection $data)
    {
        $this->fill([
            'perks' => data_get($data, 'perks'),
            'title' => data_get($data, 'title'),
            'location' => data_get($data, 'location'),
            'overview' => data_get($data, 'overview'),
            'apply_url' => data_get($data, 'apply_url'),
            'experience' => data_get($data, 'experience'),
            'category_id' => data_get($data, 'category_id'),
            'on_site_days' => data_get($data, 'on_site_days'),
            'listing_type' => data_get($data, 'listing_type'),
            'employee_availability' => data_get($data, 'employee_availability'),
        ]);
    }

    public function getCategoriesProperty()
    {
        return Category::pluck('name', 'id');
    }

    public function getListingTypesProperty()
    {
        return ListingTypeEnum::cases();
    }

    public function getEmployeeAvailabilitiesProperty()
    {
        return EmployeeAvailabilityEnum::cases();
    }

    public function getShowOnsiteDaysProperty()
    {
        if (empty($this->employee_availability)) {
            return false;
        }

        return $this->processShowOnsiteDays($this->employee_availability);
    }

    public function updatedEmployeeAvailability(string $value)
    {
        $this->showOnsiteDays = $this->processShowOnsiteDays($value);
    }


    public function unpackTags(?string $tags = null): array
    {
        $tags ??= $this->tags;

        return explode(
            separator: ',',
            string: Str::replace(', ', ',', $tags)
        );
    }

    protected function processShowOnsiteDays(string $value): bool
    {
        return match (EmployeeAvailabilityEnum::tryFrom($value)) {
            EmployeeAvailabilityEnum::HYBRID => true,
            EmployeeAvailabilityEnum::ONSITE => true,
            null => false,
            default => false
        };
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
