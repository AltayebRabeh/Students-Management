<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquationRequest extends FormRequest
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
            'name' => 'required|min:5|max:250|unique:equations,name,' . $this->id,
            'cgp' => 'required|numeric',
            'cgp_success' => 'required|numeric',
            'fails' => 'int',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الحقل مطلوب',
            'name.min' => 'لا يجب ان يكون اقل من 5',
            'name.max' => 'لا يجب ان يكون اكثر من 250',
            'name.unique' => 'القيمة موجودة من قبل',

            'cgp.required' => 'الحقل مطلوب',
            'cgp.numeric' => 'يجب ان يكون رقم عشري او صحيح',

            'cgp_success.required' => 'الحقل مطلوب',
            'cgp_success.numeric' => 'يجب ان يكون رقم عشري او صحيح',

            'fails.numeric' => 'يجب ان يكون رقم',
        ];
    }
}
