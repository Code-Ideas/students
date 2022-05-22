<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ClinicRequest extends FormRequest
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
            'medical_department_id' => 'required|numeric|exists:medical_departments,id'
        ];
    }

    public function attributes()
    {
        return [
            'phone' => 'رقم الهاتف',
            'message' => 'رسالتك',
            'medical_department_id' => 'القسم الطبي'
        ];
    }
}
