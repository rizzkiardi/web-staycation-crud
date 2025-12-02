<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max_length:255',
            'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'location' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama hotel wajib diisi.',
            'location.required' => 'Lokasi hotel wajib diisi.',
            'price.required' => 'Harga hotel wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'image.image' => 'File gambar tidak valid.',
        ];
    }
}
