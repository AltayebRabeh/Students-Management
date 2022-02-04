<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'name' => 'required|min:5|max:255|unique:sections,name',
            'count_of_classroom' => 'required|int|min:1|max:5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ملء حقل إسم القسم',
            'name.min' => 'يجب الايكون إسم القسم اقل من 5 احرف',
            'name.max' => 'يجب الايكون إسم القسم اكثر من 255 احرف',
            'name.unique' => 'إسم القسم موجود مسبقاً',
            'count_of_classroom.required' => 'كتابة عدد الصفوف في القسم',
            'count_of_classroom.int' => 'يجب ان يكون رقم',
            'count_of_classroom.min' => 'يجب ان لايقل عن 1',
            'count_of_classroom.max' => 'يجب ان لايزيد عن 5',
        ];
    }
}
