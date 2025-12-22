<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('accounts')->ignore($this->user()->id),
            ],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Vui lòng nhập :attribute.',
            'email.required' => 'Vui lòng nhập :attribute.',
            'email.email' => 'Vui lòng nhập đúng định dạng :attribute.',
            'email.unique' => ':attribute đã được sử dụng.',
        ];
    }

    public function attributes(): array
    {
        return [
            'full_name' => 'họ và tên',
            'email' => 'email',
            'phone_number' => 'số điện thoại',
            'address' => 'Địa chỉ',
        ];
    }
}
