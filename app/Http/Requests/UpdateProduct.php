<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'title' => 'nullable|min:5|max:255',
            'price' => 'nullable|numeric|min:250',
            'old_price' => 'nullable|numeric|gt:price',
            'type' => 'nullable',
            'product_image' => 'nullable|image|mimes:jpg,png,jpeg',
            'description' => 'nullable|min:20',
            'phone_number' => 'nullable|min:9|max:9',
            'location' => 'nullable|min:5|max:255'
        ];
    }
}
