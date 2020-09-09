<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvRequest extends FormRequest
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
            'position_id' => 'required|exists:advertisement_positions,id',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'position_id.required' => '请选择广告位置',
            'content.required' => '去选择广告图片',
            //'content.image' => '图片格式不正确',
        ];
    }
}
