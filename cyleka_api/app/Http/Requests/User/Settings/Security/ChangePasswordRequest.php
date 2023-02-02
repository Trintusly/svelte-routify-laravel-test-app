<?php

namespace App\Http\Requests\User\Settings\Security;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'newPassword'     => 'required|min:8|max:128',
            'currentPassword' => function ($att, $val, $fail) {
                
                if (empty($val)) {
                    return $fail("The current password field is required.");
                }

                /*
                    Check if current password is incorrect
                */

                if (!\password_verify($val, auth()->user()->password)) {
                    return $fail("Your current password is incorrect.");
                }

            },
        ];
    }
}
