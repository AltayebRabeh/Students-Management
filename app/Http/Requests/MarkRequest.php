<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
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
            'mark' => 'required|min:1|max:20',
            'min'  => 'required|int|min:0|max:999',
            'max'  => 'required|int|min:1|max:999',
        ];
    }

    public function messages()
    {
        return [
            'mark.required' => 'الرجاء إدخال الرمز',
            'mark.min' => 'يجب ان لايكون اقل من 1',
            'mark.max' => 'يجب ان لايكون اكثر من 20',

            'min.required' => 'الرجاء إدخال الحقل',
            'min.int'  => 'يجب ان يكون رقم',
            'min.min'  => 'يجب ان لايكون اقل من 0',
            'min.max'  => 'يجب ان لايكون اكثر من 255',

            'max.required' => 'الرجاء إدخال الحقل',
            'max.int'  => 'يجب ان يكون رقم',
            'max.min'  => 'يجب ان لايكون اقل من 1',
            'max.max'  => 'يجب ان لايكون اكثر من 255',
        ];
    }
}
