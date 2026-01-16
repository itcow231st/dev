<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $id = $this -> input('id');
        return [
            'category_id' => 'required',
            'name' => [
                'required',
                Rule::unique('products','name')->ignore($id)
            ],
            'price' => 'required',
            'description' => 'nullable',
            'image_url' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Vui lòng chọn :attribute',
            'name.required' => 'Vui lòng nhập :attribute',
            'name.unique' => ':attribute đã tồn tại',
            'price.required' => 'Vui lòng nhập :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'danh mục',
            'name' => 'tên sản phẩm',
            'price' => 'giá sản phẩm',
            'description' => 'mô tả',
            'image_url' => 'ảnh'
        ];
    }
}
