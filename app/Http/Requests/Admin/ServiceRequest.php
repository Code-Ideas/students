<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'priority' => 'required|numeric|unique:services,priority,'.optional($this->service)->id,
            'parent_id' => $this->filled('parent_id') ? 'numeric|exists:services,id' : '',
            'link' => $this->get('type') == 'link' ? 'string|url' : '',
            'collage_id' => 'required|numeric|exists:collages,id'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'اسم الخدمة',
            'priority' => 'الترتيب',
            'parent_id' => 'الخدمة الرئيسية',
            'link' => 'الرابط الخارجي للخدمة',
            'collage_id' => 'الكلية التابع لها'
        ];
    }
}
