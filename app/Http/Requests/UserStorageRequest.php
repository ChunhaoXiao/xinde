<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStorageRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '邮件地址不能为空',
            'email.email' => '邮件格式不正确',
            'password.required' => '密码不能为空',
            'password.min' => '密码最少 6 位数',
        ];
    }
}
