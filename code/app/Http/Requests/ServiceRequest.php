<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
        $id = $this->input('id');
        return [
            'id' => 'nullable',
            'name' => ['required',
            Rule::unique('service','name')->ignore($id),
        ],
            'image_url' => 'nullable',
            'image_url_old' => 'nullable'       
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên dịch vụ'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống!',
            'name.unique' => ':attribute đã tồn tại!', 
        ];  
    }
}
