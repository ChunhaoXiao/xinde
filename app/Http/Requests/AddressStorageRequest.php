<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStorageRequest extends FormRequest
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
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'consignee' => 'required',
            'mobile' => 'required|regex:/^1[345789][0-9]{9}$/',
        ];
    }

    public function messages()
    {
        return [
            'province.required' => '请选择省份' ,
            'city.required' => '请选择城市',
            'district.required' => '请选择区县',
            'consignee.required' => '收件人姓名不能为空',
            'mobile.required' => '联系电话不能为空',
            'mobile.regex' => '电话格式不正确',
        ];
    }
}
