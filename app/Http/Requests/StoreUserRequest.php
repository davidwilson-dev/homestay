<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /* Prepare For Validation */
    protected function prepareForValidation()
    {
        if ($this->filled('dateOfBirth')) {
            $this->merge([
                'dateOfBirth' => Carbon::createFromFormat('d/m/Y', $this->dateOfBirth)
                    ->format('Y-m-d'),
            ]);
        }
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
            // 'password' => 'required|min:8|confirmed',
            'role_id' => 'required|integer|min:1',
            'full_name' => 'required|string|min:5|max:50',
            'dateOfBirth' => 'required|date|after_or_equal:dateOfBirth',
            'phone' => 'required',
            'facility_id' => 'required|integer',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email là thông tin bắt buộc',
            'email.unique' => 'Nhân viên này đã có tài khoản',
            'email.email' => 'Email không đúng định dạng',
            // 'password.required' => 'Mật khẩu là thông tin bắt buộc',
            // 'password.min' => 'Mật khâu tối thiểu có 8 ký tự',
            // 'password.confirmed' => 'Xác nhận mật khẩu không khớp',
            'role_id.required' => 'Bạn phải chọn quyền hạn tài khoản',
            'role_id.integer' => 'Quyền hạn tài khoản không hợp lệ',
            'role_id.min' => 'Quyền hạn tài khoản không hợp lệ',
            'full_name.required' => 'Họ tên là thông tin bắt buộc',
            'full_name.min' => 'Họ tên tối thiểu 5 ký tự',
            'full_name.max' => 'Họ tên tối đa 50 ký tự',
            'dateOfBirth.required' => 'Ngày sinh là thông tin bắt buộc',
            'phone.required' => 'Số điện thoại là thông tin bắt buộc',
            'facility_id.required' => 'Phải chọn cơ sở Homestay cho nhân viên',
            'avatar.required' => 'Ảnh đại diện là bắt buộc'
        ];
    }
}
