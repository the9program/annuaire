<?php

namespace App\Http\Requests\Personal\Real;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property boolean default
 */
class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address'   => ['required', 'string', 'max:255'],
            'build'     => ['required', 'int'],
            'floor'     => ['nullable', 'int', 'max:1000'],
            'apt_nbr'   => ['required_with:floor', 'max:10000'],
            'zip'       => ['nullable', 'int', 'max:10000000000'],
            'city_id'   => ['required', 'int', 'exists:cities,id']
        ];
    }
}
