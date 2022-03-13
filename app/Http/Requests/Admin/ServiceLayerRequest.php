<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceLayerRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|min:3|max:55',
            'department_id' => $this->filled('department_id') ? 'required|numeric|exists:departments,id' : '',
            'year_id' => $this->filled('year_id') ? 'required|numeric|exists:years,id' : '',
        ];
        if ($this->get('content_type') == 'content') {
            return $rules + ['content' => 'required|string|min:10'];
        } elseif ($this->get('content_type') == 'content_files') {
            return $rules + [
                    'content' => 'required|string|min:10',
                    'attachments' => 'required|array|min:1',
                    'attachments.*' => 'mimes:pdf|max:2048'
                ];
        } elseif ($this->get('content_type') == 'files') {
            return $rules + [
                    'attachments' => 'required|array|min:1',
                    'attachments.*' => 'mimes:pdf|max:2048'
                ];
        } else {
            return $rules;
        }
    }

    public function attributes()
    {
        return [
            'title' => 'العنوان',
            'content' => 'المحتوي',
            'attachments' => 'المرفقات',
            'attachments.*' => 'المرفق',
            'department_id' => 'القسم',
            'year_id' => 'الفرقة الدراسية',
        ];
    }
}
