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
            'role_id' => 'required|integer|min:1',
            'staff_id' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email là thông tin bắt buộc',
            'email.unique' => 'Nhân viên này đã có tài khoản',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là thông tin bắt buộc',
            'password.min' => 'Mật khâu tối thiểu có 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
            'role_id.required' => 'Bạn phải chọn quyền hạn tài khoản',
            'role_id.integer' => 'Quyền hạn tài khoản không hợp lệ',
            'role_id.min' => 'Quyền hạn tài khoản không hợp lệ',
            'staff_id.required' => 'Bạn phải chọn nhân viên',
            'staff_id.integer' => 'Nhân viên không hợp lệ',
            'staff_id.min' => 'Bạn phải chọn nhân viên'
        ];
    }
}
