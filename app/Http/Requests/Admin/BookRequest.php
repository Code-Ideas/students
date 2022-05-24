<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'book' => ($this->method() === 'POST' ? 'required|' : '') . 'mimes:pdf',
            'department_id' => 'required|numeric|exists:departments,id',
            'year_id' => 'required|numeric|exists:years,id',
            'student_id' => 'required|numeric|exists:users,id',
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
            'accepted' => 'الموافقة علي شروط النشر',
            'student_id' => 'الطالب'
        ];
    }
}
