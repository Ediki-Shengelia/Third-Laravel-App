<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'title' => 'required|min:5|max:255',
            'price' => 'required|numeric|min:250',
            'old_price' => 'nullable|numeric|min:1',
            'type' => 'required',
            'product_image' => 'required|image|mimes:jpg,png,jpeg',
            'description' => 'nullable|min:20',
            'phone_number'=>'required|min:9|max:9',
            'location' => 'required|min:5|max:255'
        ];
    }
}
