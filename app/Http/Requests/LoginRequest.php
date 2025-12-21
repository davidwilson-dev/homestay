<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'account'    => 'required|string|min:3|max:50',
            'password' => 'required|string|min:8|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'account.required' => 'Email là thông tin bắt buộc',
            'password.required' => 'Mật khẩu là thông tin bắt buộc',
            'password.min' => 'Mật khẩu tối thiểu là 8 ký tự',
            'password.max' => 'Mật khẩu tối đa là 50 ký tự',
        ];
    }
}
