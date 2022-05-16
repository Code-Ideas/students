<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\FormRequest;

class MedicalRequest extends FormRequest
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
            // 'name' => 'required|string|min:3',
            //'email' => 'required|string|email',
            'phone' => 'required|numeric|digits:11',
            'message' => 'required|string|min:10',
            'medical_department_id' => 'required|numeric|exists:medical_departments,id'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'البريد الالكتروني',
            'phone' => 'رقم الهاتف',
            'message' => 'محتوي الرسالة',
            'medical_department_id' => 'القسم الطبي'
        ];
    }
}
