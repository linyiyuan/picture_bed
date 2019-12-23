<?php

namespace App\Http\Utils;

use Illuminate\Support\Facades\Storage;

/**
 * Class Oss
 * @package App\Http\Utils
 * @Author YiYuan-LIn
 * @Date: 2019/10/16
 * 阿里云对象储存公共服务类
 */
class Oss
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/8
     * @param $fileName
     * @param $picExt
     * @param $picInfo
     * @param string $savePath
     * @return string
     * @throws \Exception
     * @description 上传图片到阿里云OSS
     */
    public static function uploadPic($fileName, $picExt = 'jpg', $picInfo = '', $savePath = '/default_img')
    {
        if (empty($fileName)) Throw new \Exception('上传文件名不允许为空', 400);
        if (empty($picInfo)) Throw new \Exception('上传文件内容不允许为空', 400);

        //处理文件路径
        $savePath = $savePath . '/' . str_replace('.jpg', '', $fileName) . '.' . $picExt;
        //图片上传
        $res = Storage::disk('oss')->put($savePath, $picInfo);
        //获取图片网络路径
        $fileUrl = env('ALIOSS_URL') . '/' . $savePath;

        //鉴别是否是图片
        if (!getimagesize($fileUrl)) Throw new \Exception('上传的文件不是图片内容', 400);

        if (!$res) Throw new \Exception('上传图片失败', 400);

        return $fileUrl;
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/7/1
     * @enumeration:
     * @param $fileName
     * @param $picInfo
     * @param string $savePath
     * @return string
     * @throws \Exception
     * @description 上传文件接口
     */
    public static function uploadFile($fileName, $picInfo, $savePath = '/default_file')
    {
        if (empty($fileName)) Throw new \Exception('上传文件名不允许为空', 400);
        if (empty($picInfo)) Throw new \Exception('上传文件内容不允许为空', 400);

        //处理文件路径
        $savePath = $savePath . '/' . $fileName;
        //图片上传
        $res = Storage::disk('oss')->put($savePath, $picInfo);
        //获取图片网络路径
        $fileUrl = env('ALIOSS_URL') . '/' . $savePath;

        if (!$res) Throw new \Exception('上传文件失败', 400);

        return $fileUrl;
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/4/25
     * @param $path
     * @return bool
     * @description 检查热更文件是否存在
     */
    public static function checkFileExistsForHotUp($path)
    {
        return Storage::disk('hotUp')->exists($path);
    }
}