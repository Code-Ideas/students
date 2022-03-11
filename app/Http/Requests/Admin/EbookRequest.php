<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EbookRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:50',
            'book' => ($this->method() === 'POST' ? 'required|' : '') . 'mimes:pdf|max:10240',
            'department_id' => 'required|numeric|exists:departments,id',
            'year_id' => 'required|numeric|exists:years,id',
            'accepted' => 'required|in:1'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'اسم الكتاب',
            'department_id' => 'القسم',
            'year_id' => 'الفرقة الدراسية',
            'book' => 'الكتاب',
            'accepted' => 'الموافقة علي شروط النشر'
        ];
    }
}
