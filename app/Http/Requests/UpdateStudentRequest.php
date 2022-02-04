<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'name' => 'required|min:10|max:150',
            'university_number' => 'required|min:5|max:15|unique:students,university_number,'. $this->id,
            'section_id' => 'required',
            'classroom_id' => 'required',
            'year_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ملء حقل اسم الطالب',
            'name.min' => 'يجب الايكون الاسم اقل من 10 احرف',
            'name.max' => 'يجب الايكون الاسم اكثر من 150 حرف',

            'university_number.required' => 'يجب ملء حقل الرقم الجامعي',
            'university_number.min' => 'يجب الايكون الرقم الجامعي اقل من 5 احرف',
            'university_number.max' => 'يجب الايكون الرقم الجامعي اكثر من 15 حرف',
            'university_number.unique' => 'الرقم الجامعي موجود من قبل',

            'section_id.required' => 'يجب إختيار القسم',
            'classroom_id.required' => 'يجب إختيار الصف',
            'year_id.required' => 'يجب إختيار السنة'
        ];
    }
}
