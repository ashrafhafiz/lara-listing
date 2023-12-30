<?php

namespace App\Http\Requests\Admin\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug',
            'icon_img' => 'nullable|image|max:3072',
            'bg_img' => 'nullable|image|max:3072',
            // 'show_at_home' => 'required|boolean',
            // 'stauts' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be string.',
            'name.max' => 'The max. length should be 255 characters',
            'slug.required' => 'The slug field is required.',
            'slug.string' => 'The slug field must be string.',
            'slug.unique' => 'The slug already exists, it must be a unique value.',
            'icon.required' => 'The icon image is required.',
            'icon.image' => 'The icon file should be of image type.',
            'icon.max' => 'The icon image size should be 3 MB max.',
            'bg_img.required' => 'The background image is required.',
            'bg_img.image' => 'The background file should be of image type.',
            'bg_img.max' => 'The background image size should be 3 MB max.',
            // 'show_ar_home.required' => 'The show at home field is required.',
            // 'status.required' => 'The status field is required.',
        ];
    }
}
