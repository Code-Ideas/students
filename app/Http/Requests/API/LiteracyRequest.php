<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\FormRequest;

class LiteracyRequest extends FormRequest
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
            'name' => 'string|min:3|max:50',
            'address' => 'string|min:3|max:150',
            'classroom' => 'required|in:home,mosque,association,collage',
            'classroom_type' => 'required|in:energizing,free,immediate_exam',
            'illiterate_id' => 'required|numeric|digits:14|unique:i_literates,illiterate_id'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'اسم المتدرب',
            'address' => 'العنوان - محل الاقامة',
            'classroom' => 'مكان الفصل',
            'classroom_type' => 'نوع الفصل',
            'illiterate_id' => 'الرقم القومي'
        ];
    }
}
