<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
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
            'full_name' => 'required',
            'email' => [
                'required',
                Rule::unique('accounts', 'email')->ignore($id)
            ],
            'phone_number' => 'required',
            'address' => 'required',
            'role_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => "Vui lòng nhập :attribute",
            'email.required' => "Vui lòng nhập :attribute",
            'email.unique' => ":attribute đã tồn tại",
            'phone_number.required' => "Vui lòng nhập :attribute",
            'address.required' => "Vui lòng nhập :attribute",
            'role_id.required' => "Vui lòng chọn :attribute",
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'tên',
            'email' => 'email',
            'phone_number' => 'số điện thoại',
            'address' => 'địa chỉ',
            'role_id' => 'vai trò'
        ];
    }
}
