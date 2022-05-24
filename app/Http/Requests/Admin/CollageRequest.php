<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CollageRequest extends FormRequest
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
            'priority' => 'required|numeric|unique:collages,priority,'.optional($this->collage)->id,
            'years' => 'required|array',
            'years.*' => 'required|numeric|exists:years,id'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'اسم الكلية',
            'priority' => 'الترتيب',
            'years' => 'الفرق الدراسية'
        ];
    }
}
