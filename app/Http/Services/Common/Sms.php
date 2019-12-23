<?php

namespace App\Http\Services\Common;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\Self_;
use PhpParser\Node\Stmt\Static_;
use PhpParser\Node\Stmt\Throw_;

/**
 * Class Sms
 * @package App\Http\Services\Common
 * @Author YiYuan-LIn
 * @Date: 2019/2/28
 * 信息公共服务类
 */
class Sms
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/25
     * @param $title
     * @param $mobile
     * @param $type
     * @return bool
     * @throws \Exception
     * @description 发送短信服务
     */
    public static function sendMsg($title, $mobile, $type)
    {
        $cacheKey = "UserPortalSendMsg_$type:".$mobile;
        $result   = Redis::get($cacheKey);

        if($result) Throw new \Exception('短信发送太过频繁，请等两分钟后再重试',400);

        //接口请求地址
        $api_url = env('SMS_URL', '');
        $appKey =  env('SMS_SIRUI_APPKEY', '');
        $tpl_id =  env('SMS_SIRUI_TPL_ID_1', '');

        //请求数据
        $postData = array(
            'key'		=> $appKey,             //您申请的APPKEY
            'mobile'    => $mobile, 			//接受短信的用户手机号码
            'tpl_id'    => $tpl_id, 			//您申请的短信模板ID
            'tpl_value' => '#code#='.$title, 	//模板变量内容
        );

        //写入缓存中，防止恶意重复请求
        Redis::setex($cacheKey, 120 ,$title);

        //写入缓存中，用于限制24小时内允许的发送短信次数
        $phoneCacheKey = 'UserPortalSendMsgDayLimit_' . $mobile;
        if (empty(Redis::get($phoneCacheKey))) {
            Redis::get($phoneCacheKey);
        }elseif (Redis::get($phoneCacheKey) == 5) {
            Throw new \Exception('已经超出当天发送短信次数', 400);
        }else{
            Redis::incr($phoneCacheKey);
            Redis::EXPIRE($phoneCacheKey, 60 * 60 * 24);
        }

        //发送短信
        $result = self::askCurl($api_url, $postData, 1);
        $result = json_decode($result,true);

        if(empty($result)) return false;

        $error_code = $result['error_code'];

        //判断发送短信是否成功
        if($error_code == 0){
            return true;
        }else{
            Throw new \Exception('短信验证码发送失败', 400);
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/25
     * @param $url
     * @param bool $params
     * @param int $isPost
     * @return bool|string
     * @description 请求接口返回内容
     */
    public static function askCurl($url,$params=false,$isPost=0){
        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $isPost ){
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }else{

            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }

        $return_str = curl_exec( $ch );
        curl_close( $ch );
        if($return_str === false){
            return false;
        }
        return $return_str;
    }

}