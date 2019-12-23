<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redis;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Api\ServerController;

/**
 * Class BaseService
 * @package App\Http\Services
 * @Author YiYuan-LIn
 * @Date: 2019/4/25
 * 服务基础类
 */
abstract class  BaseService
{
    protected static $_instance = [];

    protected $params = [];

    protected $md5 = [];

    protected function __construct() {

    }

    /**
     * 单例对象
     *  修改为多单例子类继承方式
     * @return mixed
     */
    public static function getInstance() {
        $className = get_called_class();
        if (!isset(static::$_instance[$className]) || !static::$_instance[$className]) static::$_instance[$className] = new static();
        return static::$_instance[$className];
    }

    /**
     * 禁用克隆
     * @author Xiaozhi.tan
     */
    protected function __clone() { }

    /**
     * 抛出异常
     * @author YiYuan Lin
     * @param $message
     * @param $code
     * @throws \Exception
     */
    public function throwExp($code = 0, $message = '') {
        if (empty($code)) $code = 500;

        throw new \Exception($message, $code);
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/25
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
     * @Date: 2019/4/13
     * @return mixed|string
     * @description 获取IP
     */
    public function getIp(){
        if(!empty($_SERVER["HTTP_CLIENT_IP"])) $cip = $_SERVER["HTTP_CLIENT_IP"];
        else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        else if(!empty($_SERVER["REMOTE_ADDR"])) $cip = $_SERVER["REMOTE_ADDR"];
        else $cip = "";
        //去除冗余字符
        $cip = str_replace("::ffff:", "", $cip);
        return $cip;
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/13
     * @param $array
     * @param $position
     * @param $insert_array
     * @description 在指定位置插入数组
     */
    public function array_insert (&$array, $position, $insert_array)
    {
        $first_array = array_splice ($array, 0, $position);
        $array = array_merge ($first_array, $insert_array, $array);
    }
}