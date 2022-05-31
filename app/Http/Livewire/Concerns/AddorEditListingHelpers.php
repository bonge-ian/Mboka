<?php

declare(strict_types=1);

namespace App\Http\Livewire\Concerns;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Domain\States\ListingTypeEnum;
use App\Domain\States\EmployeeAvailabilityEnum;

trait AddOrEditListingHelpers
{
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

    protected function processShowOnsiteDays(string $value): bool
    {
        return match (EmployeeAvailabilityEnum::tryFrom($value)) {
            EmployeeAvailabilityEnum::HYBRID => true,
            EmployeeAvailabilityEnum::ONSITE => true,
            null => false,
            default => false
        };
    }

    protected function formatLocationProperty()
    {
        return (!str_contains($this->location, ", "))
            ? ucwords(Str::replace(",", ", ", $this->location))
            : ucwords($this->location);
    }
}
