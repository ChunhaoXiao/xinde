<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
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
        if(isset($this->cart)) {
            return [
                'quantity' =>  'required|numeric|min:1'
            ];
        }

        return [
            'goods_id' => 'required|exists:goods,id',
            'quantity' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        
        return [
            'goods_id.required' => '请选择商品',
            'goods_id.exists' => '商品不存在或已经下架',
            'quantity.required' => '商品数量不能为空',
            'quantity.numeric' => '商品数量必须是数字',
            'quantity.min' => '商品数量必须大于0',
        ];
    }
}
