<?php

namespace App\Http\Controllers\Api\System;

use App\Http\Controllers\Api\CommonController;
use App\Models\Log\LoginInfo;
use App\Models\Order\Order;
use App\Models\User\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends CommonController
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/6/5
     * @return \Illuminate\Http\JsonResponse
     * @description 获取首页展示数据
     */
    public function showData()
    {
        try {
            $nowDate = date('Y-m-d');
            $now_begin_time = strtotime($nowDate);
            $now_end_time   = strtotime($nowDate) + 86400;

            //总用户数量
            $dataSummary['all_register']   = 100;

            //当天新用户注册数
            $dataSummary['new_register']   =  200;

            //当天登录用户数
            $dataSummary['new_login']      =   300;

            //当天交易金额
            $dataSummary['new_recharge']   =  300;

            return handleResult(200, [
                    'dataSummary' => $dataSummary,
                ]);

        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }
}
