<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreYearRequest extends FormRequest
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
            'from' => 'required|int|min:1900|max:3000',
            'to' => 'required|int|min:1900|max:3000'
        ];
    }

    public function messages()
    {
        return [
            'from.required' => 'الحقل مطلوب',
            'from.int' => 'يجب ان يكون رقم',
            'from.min' => 'اقل قيمة هي 1900',
            'from.max' => 'اكبر قيمة هي 3000',

            'to.required' => 'الحقل مطلوب',
            'to.int' => 'يجب ان يكون رقم',
            'to.min' => 'اقل قيمة هي 1900',
            'to.max' => 'اكبر قيمة هي 3000',
        ];
    }
}
