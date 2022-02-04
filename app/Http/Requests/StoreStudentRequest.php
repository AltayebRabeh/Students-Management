<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'students.*.name' => 'required|min:10|max:150',
            'students.*.university_number' => 'required|min:5|max:10|unique:students,university_number',
            'section_id' => 'required',
            'classroom_id' => 'required',
            'year_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'students.*.name.required' => 'يجب ملء حقل اسم الطالب',
            'students.*.name.min' => 'يجب الايكون الاسم اقل من 10',
            'students.*.name.max' => 'يجب الايكون الاسم اكثر من 150',

            'students.*.university_number.required' => 'يجب ملء حقل الرقم الجامعي',
            'students.*.university_number.min' => 'يجب الايكون الرقم الجامعي اقل من 5',
            'students.*.university_number.max' => 'يجب الايكون الرقم الجامعي اكثر من 10',
            'students.*.university_number.unique' => 'الرقم الجامعي موجود من قبل',
            
            'section_id.required' => 'يجب إختيار القسم',
            'classroom_id.required' => 'يجب إختيار الصف',
            'year_id.required' => 'يجب إختيار السنة'
        ];
    }
}
