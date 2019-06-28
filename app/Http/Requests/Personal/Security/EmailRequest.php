<?php

namespace App\Http\Requests\Personal\Security;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EmailRequest
 * @property string $email
 * @package App\Http\Requests\Personal\Security
 */
class EmailRequest extends FormRequest
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
            'email'     => 'required|email|unique:users,id,' . auth()->id()
        ];
    }
}
