<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
class GoodsCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return $this->goods->order;
        // OrderDetail::where(function($query) {

        // })
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $good = $this->goods;
        
        return [
            'content' => 'required|max:500',
            'grade' => 'nullable|numeric',
            'order_id' => [
                'required', 
                function($attribute, $value, $fail) {
                    if($this->user()->orders()->where('id', $value)->where('status', 3)->whereHas('order_details', function($query){
                        $query->where('goods_id', $this->good->id);
                    })->doesntExist()) {
                        $fail('无权评论');
                    }
                },
                Rule::unique("goods_comments")->where("goods_id", $this->good->id),
            ],
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '评论内容不能为空',
            'order_id.required' => '订单号不能为空',
            'order_id.unique' => '已经评论过了'
        ];
    }
}
