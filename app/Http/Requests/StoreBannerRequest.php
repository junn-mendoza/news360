<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'banner_slider_id' => 'required|exists:banner_sliders,id',
            'title' => 'required|string|max:255',
            'video' => 'required|string',
            'poster' => 'nullable|string',
            'show' => 'boolean',
            'logo' => 'nullable|string',
            'time_slot' => 'nullable|string',
            'slug' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'link' => 'nullable|string',
            'image_logo' => 'nullable|boolean',
            'logo_width' => 'nullable|integer',
        ];
    }
}
