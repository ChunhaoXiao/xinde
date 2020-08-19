<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CategoryStorageRequest extends FormRequest
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
            'name' => ['required', Rule::unique('categories')->ignore($this->column)],
            'content_type_id' => 'required|exists:content_types,id',
            'icon' => 'nullable|mimes:jpeg,bmp,png',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '栏目名称不能为空',
            'name.unique' => '栏目名称已存在',
            'content_type_id.required' => '请选择内容类型',
            'content_type_id.exists' => '内容类型不存在',
        ];
    }
}
