<?php

namespace App\Http\Requests\Admin\Page;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'url' => 'URL',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords'
        ];
    }

    public function messages()
    {
        $validationMessages = config('validationmessages');
        return [
            'required' => $validationMessages['required'],
            'max' => $validationMessages['max'],
        ];
    }
}
