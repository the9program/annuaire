<?php

namespace App\Rules\Personal;

use Illuminate\Contracts\Validation\Rule;

class MobileRule implements Rule
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
        return preg_match("/^(0)[5-7]{1}[0-9]{8}$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.not_regex',['attribute' => __('validation.attributes.mobile')]);
    }
}
