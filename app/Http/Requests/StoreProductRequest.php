<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation m that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'category_id' => 'numeric',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'numeric',
            'description' => 'required',
            'image' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Yêu cầu nhập tên',
            'category_id.numeric' => 'Yêu cầu chọn thể loại',
            'quantity.required' => 'Yêu cầu nhập số lượng',
            'quantity.numeric' => 'Yêu cầu nhập vào dạng số',
            'price.required' => 'Yêu cầu nhập giá tiền',
            'price.numeric' => 'Yêu cầu nhập vào dạng số',
            'status.numeric' => 'Yêu cầu chọn trạng thái',
            'description.required' => 'Yêu cầu mô tả sản phẩm',
            'image.required' => 'Yêu cầu chọn ảnh sản phẩm',
        ];
    }
}
