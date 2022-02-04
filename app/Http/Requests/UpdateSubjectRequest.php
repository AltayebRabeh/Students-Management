<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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
            'name' => 'required|max:255|unique:subjects,name,'. $this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ملء حقل إسم المادة',
            'name.max' => 'يجب الايكون إسم المادة اكثر من 255 حرف',
            'name.unique' => 'إسم المادة موجود مسبقاً',
        ];
    }
}
