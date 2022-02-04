<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'name' => 'required|min:10|max:255|unique:teachers,name,'. $this->id,
            'section_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ملء حقل إسم الاستاذ',
            'name.min' => 'يجب الايكون إسم الاستاذ اقل من 10 حرف',
            'name.max' => 'يجب الايكون إسم الاستاذ اكثر من 255 حرف',
            'name.unique' => 'إسم الاستاذ موجود مسبقاً',
            'section_id.required' => 'يجب إختيار القسم'
        ];
    }
}
