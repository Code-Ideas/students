<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'    => 'required|string|min:3|max:150',
            'body'    => 'required|string|min:15',
            'service_id' => 'required|numeric|exists:services,id',
            'image' => ($this->method() === 'POST' ? 'required|' : '') . 'image'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'image' => 'صورة الخبر',
            'title' => 'عنوان الخبر',
            'body' => 'محتوي الخبر',
            'section_id' => 'الخدمة'
        ];
    }
}
