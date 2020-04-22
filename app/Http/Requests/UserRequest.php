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
            
                'department' => 'required',
                'gender' => 'required',
                'grade' => 'required',
                'language_basis' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'department.required' => '学部を選択してください。',
            'gender.required' => '性別を選択してください。',
            'grade.required' => '学年を選択してください。',
            'language_basis.required' => '言語基準を選択してください。',
        ];
    }

}
