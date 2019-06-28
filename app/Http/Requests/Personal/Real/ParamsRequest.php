<?php

namespace App\Http\Requests\Personal\Real;

use App\Rules\Personal\BirthRule;
use App\Rules\Personal\GenderRule;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ParamsRequest
 * @property mixed avatar
 * @property string last_name
 * @property string first_name
 * @property string gender
 * @property Carbon birth
 * @property string cin
 * @package App\Http\Requests\Personal\Real
 */
class ParamsRequest extends FormRequest
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
            'avatar'        => ['nullable', 'mimes:jpg,jpeg,png,gif'],
            'last_name'     => ['required', 'string', 'min:3', 'max:8'],
            'first_name'    => ['required', 'string', 'min:3', 'max:8'],
            'gender'        => ['required', 'int', new GenderRule()],
            'birth'         => ['required', 'date', new BirthRule()],
            'cin'           => ['nullable', 'string', 'max:20', 'min:5', 'unique:reals,cin,'  . auth()->user()->real->id],
        ];
    }
}
