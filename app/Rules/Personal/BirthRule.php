<?php

namespace App\Rules\Personal;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class BirthRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Carbon::parse($value)->format('Y-m-d') <= Carbon::now()->subYears(18)->format('Y-m-d');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.not_regex', ['attribute' => __('validation.attributes.birth')]);
    }
}
