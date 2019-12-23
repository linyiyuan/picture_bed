<?php
/**
 * Created by PhpStorm.
 * User: moTzxx
 * Date: 2017/12/28
 * Time: 17:47
 */

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/24
 * @param $code
 * @param $data
 * @param $message
 * @return \Illuminate\Http\JsonResponse
 * @description 公用的方法  返回json数据，进行信息的提示
 */
function handleResult($code = 200, $message = 'success', $data = []){

    $data = [
        'errorCode' => $code,
        'message' => $message,
        'data'      => $data
    ];

    return Response()->json($data);
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/24
 * @param $code
 * @param $data
 * @return \Illuminate\Http\JsonResponse
 * @description 公用的方法  返回json数据，进行信息的提示
 */
function handleErrorResult($code, $data){

    $data = [
        'errorCode' => $code,
        'data'      => [
            'message' => $data
        ]
    ];

    return Response()->json($data);
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param $ip
 * @return mixed
 * @description  根据IP获取地区地址(淘宝开放接口)
 */
function getClientIpInfo($ip)
{
    $url="http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip;
    $info = curl_get($url);
    $res = json_decode($info,true);
    if($res['code'] != 0){
        $url = "http://ip.taobao.com/service/getIpInfo2.php?ip=" . $ip;
        $info = curl_get($url);
        $res = json_decode($info,true);
    }
    return $res;
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param $url
 * @param array $data
 * @param string $username
 * @param string $password
 * @param int $timeout
 * @param string $mode
 * @return bool|string
 * @throws Exception
 * @description curl请求
 */
function gethttpcnt($url,$data = array(),$username = '',$password = '',$timeout = 30, $mode = "POST"){
    try{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        //在需要用户检测的网页里需要增加下面两行
        if($username && $password){
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);
        }
        $cnt = curl_exec($ch);
        curl_close($ch);
    }catch(Exception $e){
        throw new Exception($e -> getMessage());
    }
    return $cnt;
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param $url
 * @param $data
 * @param array $headers
 * @param int $timeout
 * @return bool|string
 * @throws Exception
 * @description curl请求(json格式)
 */
function requestHttpByJson($url,$data,$headers = array(),$timeout = 5){
    try{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        if(!empty($headers)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $cnt = curl_exec($ch);
        curl_close($ch);
    }catch(Exception $e){
        throw new Exception($e -> getMessage());
    }
    return $cnt;
}


/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @return mixed|string
 * @description 获取客户端请求的IP
 */
function getClientIp(){
    if(!empty($_SERVER["HTTP_CLIENT_IP"]))
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    else if(!empty($_SERVER["REMOTE_ADDR"]))
        $cip = $_SERVER["REMOTE_ADDR"];
    else
        $cip = "";
    $cip = str_replace("::ffff:", "", $cip);	//去除冗余字符
    return $cip;
}


/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param $dataParams
 * @return string
 * @description 升序排列参数
 */
function ksortData($dataParams){
    ksort($dataParams);
    $enData = '';
    foreach( $dataParams as $key=>$val ){
        $enData .= '&'.$key.'='.$val;
    }
    return ltrim($enData,'&');
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param $url
 * @return bool|string
 * @description curl for get
 */
function curl_get($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    //参数为1表示传输数据，为0表示直接输出显示。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    //参数为0表示不带头文件，为1表示带头文件
    curl_setopt($ch, CURLOPT_HEADER,0);
    $output = curl_exec($ch);
    //关闭URL请求
    curl_close($ch);
    //返回数据
    return $output;
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param $url
 * @param null $data
 * @return bool|string
 * @description curl for post
 */
function curl_post($url,$data = null){
    $curl = curl_init();

    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    if(!empty($data)){//如果有数据传入数据
        curl_setopt($curl,CURLOPT_POST,1);//CURLOPT_POST 模拟post请求
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);//传入数据
    }

    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    $output = curl_exec($curl);
    curl_close($curl);

    return $output;
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param $len
 * @return string
 * @description 随机生成字符串
 */
function getRandStr($len)
{
    $chars = array(
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K",
        "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V",
        "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g",
        "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r",
        "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3",
        "4", "5", "6", "7", "8", "9"
    );

    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i = 0; $i < $len; $i++) {
        $output .= $chars[mt_rand(0, $charsLen)];
    }

    return $output;
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param $str
 * @param $key
 * @return string
 * @description 根据Hmac-Sha1签名
 */
function getSignatureByHmacSha1($str, $key) {
    $signature = "";
    if (function_exists('hash_hmac')) {
        $signature = base64_encode(hash_hmac("sha1", $str, $key, true));
    } else {
        $blocksize = 64;
        $hashfunc = 'sha1';
        if (strlen($key) > $blocksize) {
            $key = pack('H*', $hashfunc($key));
        }
        $key = str_pad($key, $blocksize, chr(0x00));
        $ipad = str_repeat(chr(0x36), $blocksize);
        $opad = str_repeat(chr(0x5c), $blocksize);
        $hmac = pack(
            'H*', $hashfunc(
                ($key ^ $opad) . pack(
                    'H*', $hashfunc(
                        ($key ^ $ipad) . $str
                    )
                )
            )
        );
        $signature = base64_encode($hmac);
    }
    return $signature;
}

/**
 * @Author YiYuan-LIn
 * @Date: 2019/4/10
 * @param string $data
 * @return array|mixed
 * @description 对象转数组
 */
function objToArray($data = ''){
    if (empty($data)) return [];
    return json_decode(json_encode($data),true);
}


/**
 * 打印数据
 */
function pre($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}