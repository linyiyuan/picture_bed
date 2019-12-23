<?php

namespace App\Http\Utils;

/**
 * Class PhoneRecharge
 * @package App\Http\Utils
 * @Author YiYuan-LIn
 * @Date: 2019/7/8
 * 根据cron表达式获取下次执行时间
 */
class GetTimeByCron
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/7/13
     * @enumeration:
     * @param $cron
     * @return bool|string
     * @description 根据cron表达式获取下次执行时间
     */
    public static function getTimeByCron($cron)
    {
        $sendData['type'] = 1;
        $sendData['expression'] = $cron;

        /* 调用服务端接口获取数据 */
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://tool.lu/crontab/ajax.html');
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}