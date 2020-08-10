<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConferenceEnrollRequest extends FormRequest
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
            'mobile' => 'required|regex:/^1[345789][0-9]{9}$/',
            'name' => 'required',
            'conference_id' => ['required', Rule::exists('conferences', 'article_id')->where(function($query){
                $query->where('enroll_begin_time', '>', now())->where('enroll_end_time', '<', 'now');
            }),
            Rule::unique('conference_enrolls')->where(function($query){
                $query->where('user_id', $this->user()->id);
            }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'conferece_id.required' => '会议id不能为空',
            'conference_id.exists' => '会议不存在或会议报名已结束',
            'conference_id.unique' => '你已报过名,不能重复报名',      
            'mobile.required' => '手机号码不能为空',
            'mobile.regex' => '手机号码格式不正确',
            'name.required' => '姓名不能为空',
        ];
    }
}
