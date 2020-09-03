<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MicrovideoCategoryRequest extends FormRequest
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
            'name' => 'required|max:50',
            'sort' => 'nullable|numeric',
            'icon' => 'nullable|mimes:jpg,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名称不能为空',
            'name.max' => '名称最大50字符',
            'sort.numeric' => '排序必须是数字',
            'icon.mimes' => '图标文件格式允许',
        ];
    }
}
