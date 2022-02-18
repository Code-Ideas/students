<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:150',
            'code' => $this->filled('code') ? 'string|min:3|max:15' : '',
            'collage_id' => 'required|numeric|exists:collages,id'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'اسم القسم',
            'code' => 'كود القسم',
            'collage_id' => 'الكلية التابع لها'
        ];
    }
}
