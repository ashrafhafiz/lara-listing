<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required|current_password',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'The current password field is required.',
            'current_password.current_password' => 'The current password field is not correct.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The min. password length should be 8 characters',
            'password_confirmation.required' => 'The password confirmation field is required.',
            'password_confirmation.same' => 'Password Confirmation should match the Password',
        ];
    }
}
