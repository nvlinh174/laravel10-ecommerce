<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'max:255',
            'phone' => 'max:255',
            'image' => $this->image ? 'image' : ''
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'phone' => 'Số điện thoại',
            'image' => 'Avatar'
        ];
    }

    public function messages()
    {
        return [
            'max' => ':attribute tối đa :max ký tự',
            'image' => 'Không phải định dạng hình ảnh'
        ];
    }
}
