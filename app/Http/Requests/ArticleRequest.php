<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Category;
class ArticleRequest extends FormRequest
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
            'title' => 'required|max:80',
            'category_id' => 'required|exists:categories,id',
            'content' => Rule::requiredIf(!empty($this->category_id) && Category::find($this->category_id)->type->identity == 'basic_article'),
            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '文章标题不能为空',
            'title.max' => '标题最长80字' ,
            'category_id.required' => '请选择栏目',
            'content.required' => '文章内容不能为空',

        ];
    }
}
