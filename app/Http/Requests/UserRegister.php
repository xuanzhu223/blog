<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UserRegister extends FormRequest
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
     * 重写错误提示方法
     * @param Validator $validator
     * @return array
     */
    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors()->all();
        $result = [
            'message' => $message[0],//这里只需要返回第一个提示信息
        ];
        return $result;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account' => 'required|unique:user|between:4,18',
            'password' => 'required|between:4,18',
            'confirmPassword' => 'required|between:4,18',
        ];
    }

    /**
     * 获取已定义验证规则的错误消息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'account.required' => '账号不能为空',
            'account.between' => '账号长度为4~18为字符',
            'account.unique' => '账号已存在',
            'password.required' => '密码不能为空',
            'password.between' => '密码长度为4~18为字符',
            'confirmPassword.required' => '确认密码不能为空',
            'confirmPassword.between' => '确认密码为4~18为字符',
        ];
    }
}
