<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Api\CommonController;
use App\Http\Services\Common\Sms;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

/**
 * Class SmsController
 * @package App\Http\Controllers\Api\Common
 * @Author YiYuan-LIn
 * @Date: 2019/6/6
 * 消息控制器
 */
class SmsController extends CommonController
{
    protected $params;

    /**
     * SmsController constructor.
     */
    public function __construct()
    {
        $this->params = Input::all();
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/6/6
     * @return \Illuminate\Http\JsonResponse
     * @description 发送短信验证码
     */
    public function sendPhoneCode()
    {
        try {
            $data = [
                'username' => $this->params['username'],
            ];

            $rules = [
                'username' => 'required',
            ];

            $message = [
                'username.required' => 'username is not null',
            ];

            $validator = Validator::make($data, $rules, $message);
            if ($validator->fails()) $this->throwExp(400,$validator->messages()->first());

            //获取用户信息
            $user = Users::where([[ 'username',$data['username'] ]])->first();

            if (!empty($user->mobile)) {
                $code = $this->randNum(6);
                $sendRes = Sms::sendMsg($code,$user->mobile,0);
                if ($sendRes == true) {
                    $user->code_addTime = time();
                    $this->throwExp(200, '发送成功');
                }
                $this->throwExp(400, '发送短信验证码失败');
            }else{
                $this->throwExp(400,'该用户没有设置手机号');
            }

        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }
}

