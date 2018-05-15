<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'field' => 'required'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        });
    }
}
