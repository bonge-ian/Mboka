<?php

namespace App\Rules\Location;

use Illuminate\Contracts\Validation\Rule;

/*
    |--------------------------------------------------------------------------
    |LocationFormat Rule
    |--------------------------------------------------------------------------
    |
    | This rule will ensure the location entered by
    | the user follows the following pattern
    | "city,county" or "city, country"
    |
*/

class LocationFormat implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return str_word_count($value) == 2 && str_contains( $value, ',');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must follow the following format "city,country".';
    }
}
