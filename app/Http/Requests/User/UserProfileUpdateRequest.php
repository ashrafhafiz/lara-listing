<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateRequest extends FormRequest
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
            'avatar' => 'nullable|image|max:2048',
            'profile_banner' => 'nullable',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|max:255|email|unique:users,email,' . $this->user()->id,
            'gender' => 'required',
            'phone' => 'nullable',
            'website' => 'nullable|url',
            'address' => 'nullable|max:255',
            'bio' => 'required',
            // 'facebook' => 'nullable|url',
            // 'twitter' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The name field is required.',
            'first_name.string' => 'The name field must be a string.',
            'first_name.max' => 'The name field must not exceed 255 characters.',
            'last_name.required' => 'The name field is required.',
            'last_name.string' => 'The name field must be a string.',
            'last_name.max' => 'The name field must not exceed 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            // 'password.required' => 'The password field is required.',
            // 'password.string' => 'The password field must be a string.',
            // 'password.min' => 'The password must be at least 8 characters long.',
            // 'password.confirmed' => 'The password confirmation does not match.',
            'website.url' => 'The website must have a complete valid url',
            // 'facebook.url' => 'The website must have a complete valid url',
            // 'twitter.url' => 'The website must have a complete valid url',
        ];
    }
}
