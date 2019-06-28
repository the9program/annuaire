<?php

namespace App\Http\Requests\Personal\Real;

use App\Rules\Personal\MobileRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string mobile
 */
class MobileRequest extends FormRequest
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

            'mobile' => ['required', 'string', 'max:10', 'min:10', new MobileRule()],

        ];
    }
}
