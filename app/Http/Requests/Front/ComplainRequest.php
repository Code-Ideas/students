<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ComplainRequest extends FormRequest
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
            'phone' => 'required|numeric|digits:11',
            'message' => 'required|string|min:15',
            'admin_department_id' => 'required|numeric|exists:admin_departments,id'
        ];
    }

    public function attributes()
    {
        return [
            'phone' => 'رقم الهاتف',
            'message' => 'محتوي الشكوي',
            'admin_department_id' => 'قسم الشكوي'
        ];
    }
}
