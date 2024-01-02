<?php

namespace App\Http\Requests\Admin\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ListingUpdateRequest extends FormRequest
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
            'image' => 'nullable|image|max:3072',
            'thumbnail' => 'nullable|image|max:3072',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:listings,slug,' . $this->listing->id,
            'category_id' => 'required|integer',
            'location_id' => 'required|integer',
            'package_id' => 'nullable|integer',
            'amenities.*' => 'nullable|integer',
            'description' => 'required',
            'attachement' => 'nullable|mimes:png,jpg,csv,pdf|max:3072',
            'google_map_embed_code' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'website' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            // 'is_verified' => 'required|boolean',
            // 'is_featured' => 'required|boolean',
            // 'stauts' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'The image is required.',
            'image.image' => 'The file should be of image type.',
            'image.max' => 'The image size should be 3 MB max.',
            'thumbnail.required' => 'The background image is required.',
            'thumbnail.image' => 'The background file should be of image type.',
            'thumbnail.max' => 'The background image size should be 3 MB max.',
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be string.',
            'title.max' => 'The max. length should be 255 characters',
            'slug.required' => 'The slug field is required.',
            'slug.string' => 'The slug field must be string.',
            'slug.unique' => 'The slug already exists, it must be a unique value.',
            'category_id.required' => 'The category is required.',
            'location_id.required' => 'The location is required.',
            'description.required' => 'The description is required.'
            // 'is_featured.required' => 'The is_featured field is required.',
            // 'status.required' => 'The status field is required.',
        ];
    }
}
