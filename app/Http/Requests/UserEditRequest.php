<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required,email',
            'phone' => 'required|numeric',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên',
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Email khong dung dinh dang',
            'phone.required' => 'Chưa nhập số điẹn thoại',
            'phone.numeric' => 'Số điẹn thoại không đúng định dạng',
            'address.required' => 'Chưa nhập địa chỉ',
        ];
    }
}