<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SupervisorRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:255|unique:admins,email,'.optional($this->supervisor)->id,
            'password' => $this->method() === 'POST' ? 'required|string|min:6|' : '',
            'admin_department_id' => 'required|numeric|exists:admin_departments,id',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'password' => 'كلمة المرور',
            'admin_department_id' => 'القسم',
        ];
    }
}
