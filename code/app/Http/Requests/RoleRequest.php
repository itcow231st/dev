<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('roles','name')->ignore($id),
            ],
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Vai trò'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống!' ,
            'name.unique' => ':attribute đã tồn tại',
        ];
    }
}
