<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            
                'product_category_id' => 'required|numeric',
                'product_condition_id' => 'required|numeric',
                'transaction_way_id' => 'required|numeric',
                'product_name' => 'required|max:255',
                'introduction' => 'required',
                'price' => 'required|numeric',           
                'user_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'product_category_id.numeric' => '商品カテゴリーを選択してください。',
            'product_condition_id.numeric' => '商品状態を選択してください。',
            'transaction_way_id.numeric' => '取引方法を選択してください。',
            'product_name.required' => '商品名を入力してください。',
            'introduction.required' => '商品説明を入力してください。',
            'price.required' => '価格を入力して下さい。',
            'price.numeric' => '  価格は半角数字で入力して下さい。',

        ];
    }
}
