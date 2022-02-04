<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelayRequest extends FormRequest
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
            'year_id' => "required",
        ];
    }

    public function messages()
    {
        return [
            'year_id.required' => 'يجب إختيار السنة'
        ];
    }
}
