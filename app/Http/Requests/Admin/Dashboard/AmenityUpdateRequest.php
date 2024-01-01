<?php

namespace App\Http\Requests\Admin\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AmenityUpdateRequest extends FormRequest
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
            'slug' => 'required|string|unique:amenities,slug,' . $this->amenity->id,
            'amenity_icon' => 'nullable|string'
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
            // 'status.required' => 'The status field is required.',
        ];
    }
}