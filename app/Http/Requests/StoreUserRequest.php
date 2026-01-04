<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
        // Check citizen identification card
        if ($this->has('citizen')) 
        {
            $citizen = normalizeCitizen($this->citizen);

            if(! $citizen)
            {
                return back()->with('error', 'CCCD invalid');
            }
        }

        // Format date of birth from d/m/Y to Y-m-d
        if ($this->filled('dateOfBirth')) 
        {
            $this->merge([
                'dateOfBirth' => Carbon::createFromFormat('d/m/Y', $this->dateOfBirth)
                    ->format('Y-m-d'),
            ]);
        }

        // Format start date from d/m/Y to Y-m-d
        if ($this->filled('start_date')) 
        {
            $this->merge([
                'start_date' => Carbon::createFromFormat('d/m/Y', $this->start_date)
                    ->format('Y-m-d'),
            ]);
        }

        // Format end date from d/m/Y to Y-m-d
        if ($this->filled('end_date')) 
        {
            $this->merge([
                'end_date' => Carbon::createFromFormat('d/m/Y', $this->end_date)
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
            'position' => 'required|string|min:3|max:20',
            'name' => 'required|string|min:5|max:50',
            'citizen' => 'required|string|size:12',
            'dateOfBirth' => ['required','date','before_or_equal:' . now()->subYears(18)->format('Y-m-d'),],
            'start_date' => ['nullable','date'],
            'end_date' => ['nullable','date'],
            'phone' => 'required',
            'facility_id' => 'nullable|integer',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email là thông tin bắt buộc',
            'email.unique' => 'Nhân viên này đã có tài khoản',
            'email.email' => 'Email không đúng định dạng',
            'position.required' => 'Bạn phải chọn chức vụ cho nhân viên',
            'name.required' => 'Họ tên là thông tin bắt buộc',
            'name.min' => 'Họ tên tối thiểu 5 ký tự',
            'name.max' => 'Họ tên tối đa 50 ký tự',
            'dateOfBirth.required' => 'Ngày sinh là thông tin bắt buộc',
            'phone.required' => 'Số điện thoại là thông tin bắt buộc',
            'facility_id.required' => 'Phải chọn cơ sở Homestay cho nhân viên',
            'avatar.required' => 'Ảnh đại diện là bắt buộc',
            'avatar.max' => 'Ảnh đại diện không được lớn hơn 2MB',
        ];
    }
}
