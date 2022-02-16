<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:6|max:100',
            'username' => 'required|min:3|max:20|unique:users,username,'.$this->id,
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => 'required|confirmed|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute مطلوب',
            'name.min' => ':attribute يجب ان لايقل عن 6',
            'name.max' => ':attribute يجب ان لايزيد عن 100',

            'username.required' => ':attribute مطلوب',
            'username.min' => ':attribute يجب ان لايقل عن 3',
            'username.max' => ':attribute يجب ان لايزيد عن 20',
            'username.unique' => ':attribute يجب ان لا يتكرر',

            'email.required' => ':attribute مطلوب',
            'email.email' => ':attribute غير صالح',
            'email.unique' => ':attribute يجب ان لا يتكرر',

            'password.required' => ':attribute مطلوب',
            'password.confirmed' => ':attribute لاتتطابق',
            'password.min' => ':attribute يجب ان لايقل عن 8',
            'password.max' => ':attribute يجب ان لايزيد عن 255',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'الاسم الكامل',
            'username' => 'اسم المستخدم',
            'email' => 'البريد الالكتروني',
            'password' => 'كلمة المرور',
        ];
    }
}
