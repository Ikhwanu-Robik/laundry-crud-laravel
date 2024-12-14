<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrder extends FormRequest
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
            "name" => "required",
            "type" => "required",
            "price" => "required",
            "qty" => "required",
            "total" => "required"
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'nama wajib diisi',
            'type.required' => 'jenis laundry wajib diisi',
            'price.required' => 'harga wajib diisi',
            'qty.required' => 'jumlah wajib diisi',
            'total.required' => 'total wajib diisi',
        ];
    }
}
