<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
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
            "id" => "required",
            "name" => "required",
            "type" => "required",
            "date_acc" => "required",
            "price" => "required",
            "qty" => "required",
            "total" => "required"
        ];
    }

    public function messages():array {
        return [
            'id.required' => 'id wajib diisi',
            'name.required' => 'nama wajib diisi',
            'type.required' => 'jenis laundry wajib diisi',
            'date_acc.required' => 'tanggal diterima wajib diisi',
            'price.required' => 'harga wajib diisi',
            'qty.required' => 'jumlah wajib diisi',
            'total.required' => 'total wajib diisi',
        ];
    }
}
