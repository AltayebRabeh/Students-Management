<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            'section_id' => 'required|int',
            'classroom_id' => 'required|int',
            'semester_id' => 'required|int',
            'year_id' => 'required',
            'subject_teacher_id' => 'required',
            'grades.*.grade' => 'required|int|min:0|max:255',
        ];
    }

    public function messages()
    {
        return [
            'section_id.required' => 'يجب إختيار قيمة',
            'section_id.int' => 'هنالك خطاْ في القيمة',

            'classroom_id.required' => 'يجب إختيار قيمة',
            'classroom_id.int' => 'هنالك خطاْ في القيمة',

            'semester_id.required' => 'يجب إختيار قيمة',
            'semester_id.int' => 'هنالك خطاْ في القيمة',

            'year_id.required' => 'يجب إختيار قيمة',

            'subject_teacher_id.required' => 'يجب إختيار قيمة',

            'grades.*.grade.required' => 'الحقل مطلوب',
            'grades.*.grade.int' => 'يجب ان يكون رقم',
            'grades.*.grade.min' => 'اقل رقم مسموح به 0',
            'grades.*.grade.max' => 'اكبر رقم مسموح به 255',
        ];
    }
}
