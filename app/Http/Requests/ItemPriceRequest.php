<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemPriceRequest extends FormRequest
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
            '*' => ['required', 'array'],
            '*.item_no' => ['required'],
            '*.customer_name' => ['required'],
            '*.customer_code' => ['required'],
            '*.item_description' => ['required'],
            '*.min_order_qty' => ['required', 'numeric'],
            '*.unit_price' => ['required', 'numeric'],
            '*.currency' => ['required', 'in:USD,PHP'],
            '*.rev_no' => ['required', 'numeric'],
        ];
    }
}
