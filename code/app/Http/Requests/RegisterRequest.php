<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'full_name' => 'required',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:6|max:32',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Vui lòng nhập :attribute',
            'email.required' => 'Vui lòng nhập :attribute',
            'email.email' => ':attribute không đúng định dạng',
            'email.unique' => ':attribute đã tồn tại',
            'password.required' => 'Vui lòng nhập :attribute',
            'password.min' => ':attribute tối thiểu 6 ký tự',
            'password.max' => ':attribute tối đa 32 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập :attribute',
            'password_confirmation.same' => ':attribute không khớp',
        ];
    }
    
    public function attributes()
    {
        return [
            'fullname' => 'họ và tên',
            'email' => 'email',
            'password' => 'mật khẩu',
            'password_confirmation' => 'xác nhận mật khẩu'
        ];
    }
}
