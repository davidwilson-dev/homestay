<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'name' => 'required|max:50',
            'role_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email là thông tin bắt buộc',
            'email.unique' => 'Email này đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là thông tin bắt buộc',
            'password.min' => 'Mật khâu tối thiểu có 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
            'name.required' => 'Họ tên là thông tin bắt buộc',
            'name.max' => 'Họ tên tối đa là 50 ký tự',
        ];
    }
}
