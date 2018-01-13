<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username' => 'required|unique:users',
            'password' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '请输入用户名',
            'username.unique' => '重复的用户名',
            'password.required' => '请输入密码',
            'mobile.required' => '请输入联系方式',
            'email.required' => '请输入邮箱',
        ];
    }


}
