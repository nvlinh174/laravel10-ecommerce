<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'password' => 'required|current_password:admin',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Mật khẩu cũ',
            'new_password' => 'Mật khẩu mới',
            'new_password_confirmation' => 'Xác nhận mật khẩu mới',
        ];
    }

    public function messages()
    {
        $validationMessages = config('validationmessages');
        return [
            'required' => $validationMessages['required'],
            'current_password' => ':attribute không đúng',
            'confirmed' => ':attribute và xác nhận :attribute không trùng khớp'
        ];
    }
}
