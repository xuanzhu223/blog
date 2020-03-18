<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Login as LoginModel;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    /**
     * 注册账号
     */
    public function register(Request $request)
    {
        $param = $request->all();
        $ret['code'] = 0;
        $ret['data'] = [];
        $ret['message'] = 'success';
        $rules = [
            'account' => 'required|unique:user|between:4,18',
            'password' => 'required|between:4,18',
            'confirmPassword' => 'required|between:4,18',
        ];
        //定义提示信息
        $messages = [
            'account.required' => '账号不能为空',
            'account.between' => '账号长度为4~18为字符',
            'account.unique' => '账号已存在',
            'password.required' => '密码不能为空',
            'password.between' => '密码长度为4~18为字符',
            'confirmPassword.required' => '确认密码不能为空',
            'confirmPassword.between' => '确认密码为4~18为字符',
        ];
        $validator = Validator::make($param, $rules, $messages);
        if ($validator->fails()) {
            //校验有错误
            $errors = $validator->errors()->first();
            $ret['code'] = -1;
            $ret['message'] = $errors;
        } else {
            if($param['password'] != $param['confirmPassword']) {
                $ret['message'] = '两次输入的密码不匹配';
                return $ret;
            }
            try {
                LoginModel::create($param);
            } catch (\Exception $e) {
                $ret['message'] = $e->getMessage();
                $ret['code'] = -1;
            }
        }
        return $ret;
    }

    /**
     * 登录
     */
    public function login()
    {

    }

    /**
     * 找回密码
     */
    public function retrievePassword()
    {

    }
}
