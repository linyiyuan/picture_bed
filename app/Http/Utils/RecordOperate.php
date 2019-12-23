<?php

namespace App\Http\Utils;

use App\Models\System\OperateLog;
use App\Models\Users;

/**
 * Class RecordOperate
 * @package App\Http\Utils
 * @Author YiYuan-LIn
 * @Date: 2019/5/31
 * 后台操作日志记录工具类
 */
class RecordOperate
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/31
     * @param $uid
     * @param string $action
     * @param string $data
     * @param string $dealResult
     * @return bool
     * @description 记录后台操作日志
     */
    public static function recordOperate($uid, $action = '', $data = '', $dealResult = '')
    {
        if (empty($uid)) return false;
        if (empty($action)) return false;

        //获取操作用户信息
        $userInfo = Users::find($uid);

        $username = $userInfo->username;
        $operator = $userInfo->desc;

        //初始化日志对象
        $operatorLog = new OperateLog();
        $operatorLog->action    = $action;
        $operatorLog->data      = $data;
        $operatorLog->uid       = $uid;
        $operatorLog->username  = $username;
        $operatorLog->operator  = $operator;
        $operatorLog->dealResult = $dealResult;

        $operatorLog->save();
        return true;
    }

}