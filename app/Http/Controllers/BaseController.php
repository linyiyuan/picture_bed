<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;
use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/7
     * @param int $code
     * @param string $message
     * @throws \Exception
     * @description 抛出异常
     */
    public function throwExp($code = 0, $message = '') {
        if (empty($code)) $code = 500;

        throw new \Exception($message, $code);
    }

    /**
     * 验证参数
     * @param $data
     * @param $rules
     * @param $message
     * @throws \Exception
     */
    public function verifyParams($data, $rules, $message)
    {
        $validator = Validator::make($data, $rules, $message);
        if ($validator->fails()) {
            $this->throwExp(400,$validator->messages()->first());
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/30
     * @param string $code
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     * @description 错误返回
     */
    public function errorResponse($code = '', $message = '', $data = [])
    {
        if ($code == '') $code = 500;

        $data = [
            'errorCode' => $code,
            'message' => $message,
            'data' => $data
        ];
        
        return Response()->json($data);
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/30
     * @param \Exception $e
     * @return \Illuminate\Http\JsonResponse
     * @description 对异常进行处理并返回
     */
    public function errorExp(\Exception $e)
    {
        if (!$e->getCode()) {
            $code = 500;
            $message = '服务器错误 ' . $e->getMessage() . ':: FILE:' . $e->getFile() . ':: LINE: ' . $e->getLine();
        } else {
            $code = $e->getCode();
            $message = $e->getMessage();
        }
        return $this->errorResponse($code, $message);
    }
}
