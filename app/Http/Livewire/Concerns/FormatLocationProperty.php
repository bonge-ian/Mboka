<?php

declare(strict_types=1);

namespace App\Http\Livewire\Concerns;

use Illuminate\Support\Str;

trait FormatLocationProperty
{
    protected function formatLocationProperty(string $location_property)
    {
        return (!str_contains($location_property, ", "))
            ? ucwords(Str::replace(",", ", ", $location_property))
            : ucwords($location_property);
    }
}
