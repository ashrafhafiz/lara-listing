<?php

namespace App\Http\Requests\Admin\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionUpdateRequest extends FormRequest
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
            'bg_img' => 'nullable|image|max:3072',
            'title' => 'required|string|max:50',
            'subtitle' => 'nullable|string|max:250',
        ];
    }

    public function messages()
    {
        return [
            'bg_img.required' => 'The background banner image is required.',
            'bg_img.image' => 'The background banner file should be of image type.',
            'bg_img.max' => 'The background banner image size should be 3 MB max.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The max. length should be 50 characters',
            'subtitle.max' => 'The max. length should be 250 characters',
        ];
    }
}
