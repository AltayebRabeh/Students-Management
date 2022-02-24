<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
        ];
    }
}
