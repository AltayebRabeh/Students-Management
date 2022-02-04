<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectTeacherRequest extends FormRequest
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
            'hours' => 'required|int|min:1|max:20',
            'subject_id' => 'required',
            'section_id' => 'required',
            'classroom_id' => 'required',
            'year_id' => 'required',
            'semester_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'hours.required' => 'يجب ادخال عدد الساعات',
            'hours.min' => 'يجب ان لايكون عدد الساعات اقل من 1',
            'hours.max' => 'يجب ان لايكون عدد الساعات اكثر من 20',
            'hours.int' => 'يجب ان يكون رقم',

            'subject_id.required' => 'يجب إختيار المادة',
            'section_id.required' => 'يجب إختيار القسم',
            'classroom_id.required' => 'يجب إختيار الصف',
            'year_id.required' => 'يجب إختيار السنة',
            'semester_id.required' => 'يجب إختيار الفصل',
        ];
    }
}
