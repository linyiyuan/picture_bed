<?php
namespace App\Http\Controllers\Api;

use App\Http\Services\ApiServices\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use PhpParser\Node\Scalar\String_;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class CommonController
 * @package App\Http\Controllers\Api
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * 接口公共实现类
 */
abstract class CommonController extends BaseController
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/11
     * @param $query
     * @param $params
     * @return mixed
     * @description 处理分页条件
     */
    public function pagingCondition($query, $params)
    {
        $cur_page   = $params['cur_page'] ?? 1;
        $page_size  = $params['page_size'] ?? 15;

        $offset = ($cur_page- 1) * $page_size;
        $limit  = $page_size;
        $query = $query->offset($offset)->limit($limit);

        return $query;
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/10
     * @param $url
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     * @description 处理url路径
     */
    public function getFullUrl($url)
    {
        if (!$url) {
            return '';
        }
        if (strtolower(substr($url, 0, 4)) == 'http') {
            return $url;
        }
        $cdn = \Config::get('app.cdn_url');
        if (strtolower(substr($cdn, 0, 4)) == 'http') {
            return $cdn . $url;
        }
        return url($url);
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/10
     * @param string $data
     * @return mixed
     * @description 对象转为数组
     */
    public function toArray($data = '')
    {
        return json_decode(json_encode($data), true);
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/10
     * @return false|int|string
     * @description 得到当前日期的零点时间
     */
    public function getNowTime()
    {
        $todayTime = date('Y-m-d', time());//获取当天时间
        $todayTime = strtotime($todayTime);

        return $todayTime;
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/10
     * @param $url
     * @return bool|string
     * @description 用来判断远程文件是否存在
     */
    public function getUrlExists($url)
    {
        if (!isset($url)) {
            return '请输入要验证的url';
        }
        $ch = curl_init();
        $timeout = 10;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $contents = curl_exec($ch);
        if (preg_match("/404/", $contents)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/8
     * @param $num
     * @return string
     * @description 根据数量获取随机验证码
     */
    public function randNum($num){
        $code = "";
        for ($i=0; $i < $num; $i++) {
            $code = $code . rand(1, 9);
        }
        return $code;
    }
}
