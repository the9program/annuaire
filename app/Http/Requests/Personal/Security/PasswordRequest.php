<?php

namespace App\Http\Requests\Personal\Security;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PasswordRequest
 * @property string $current_password
 * @property string $password
 * @package App\Http\Requests\Personal\Security
 */
class PasswordRequest extends FormRequest
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
            'current_password'  => ['required', 'string', 'min:8'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
