<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
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
            'name' => 'required|min:2|max:50|string',
            'email' => 'required|email|unique:staff',
            'phone_number' => 'required|unique:staff|string',
            'position_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email là thông tin bắt buộc',
            'email.unique' => 'Email này đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'name.required' => 'Họ tên là thông tin bắt buộc',
            'name.min' => 'Họ tên tối thiểu là 2 ký tự',
            'name.max' => 'Họ tên tối đa là 50 ký tự',
            'phone_number.required' => 'Số điện thoại là thông tin bắt buộc',
            'phone_number.unique' => 'Số điện thoại đã được sử dụng',
        ];
    }
}
