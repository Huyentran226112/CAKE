<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderDetailRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|numeric',
            'quantity' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'product_id.required' => 'Yêu cầu chọn sản phẩm',
            'product_id.numeric' => 'Yêu cầu chọn sản phẩm',
            'quantity.required' => 'Yêu cầu thêm số lượng',
            'quantity.numeric' => 'Số lượng là kiểu số',
        ];
    }
}
