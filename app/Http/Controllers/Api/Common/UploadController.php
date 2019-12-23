<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Api\CommonController;
use App\Http\Services\Common\Oss;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 * Created by YiYuan Lin
 * Created at 18/12/10
 * Class UploadController
 * 上传文件公共接口
 * @package App\Http\Controllers\Api\Common
 */
class UploadController extends CommonController
{
    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/10
     * @param Request $request
     * @return mixed
     * @description 上传图片接口
     */
    public function uploadPic(Request $request)
    {
        try {
            $params = [
                'file' => $request->file('file'),
                'savePath' => $request->savePath,
            ];

            $rules = [
                'file' => 'required|file|image',
                'savePath' => 'required',
            ];

            $message = [
                'file.required' => '文件不得为空',
                'savePath.required' => '文件路径不得为空',
                'file.file' => '请上传文件',
                'file.image' => '文件必须为图片格式（ jpeg、png、bmp、gif、或 svg ）'
            ];

            $this->verifyParams($params,$rules,$message);

            $file = $params['file'];
            $ext            = $file->getClientOriginalExtension();     // 得到上传文件的后缀
            $realPath       = $file->getRealPath();               //得到上传文件的tmp绝对路径

            if ($file->getSize() > 30000000) $this->throwExp(400, '上传图片尺寸过大');

            //拼接得到文件名
            $fileName =  md5(uniqid())  . '.' . $ext;
            //上传图片至阿里云
            $imgUrl = Oss::uploadPic($fileName, $ext, file_get_contents($realPath), $params['savePath']);

            if ($imgUrl) {
                return handleResult(200, 'success', [
                    'url' => $imgUrl,
                    'fileName' => $fileName
                ]);
            }else{
                $this->throwExp(400, '上传文件失败');
            }
        } catch(\Exception $e) {
            return $this->errorExp($e);
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/10
     * @param Request $request
     * @return mixed
     * @description 上传文件接口
     */
    public function uploadFile(Request $request)
    {
        try {
            $params = [
                'file' => $request->file('file'),
                'savePath' => $request->savePath,
            ];

            $rules = [
                'file' => 'required|file',
                'savePath' => 'required',
            ];

            $message = [
                'file.required' => '文件不得为空',
                'savePath.required' => '文件路径不得为空',
                'file.file' => '请上传文件',
            ];

            $this->verifyParams($params,$rules,$message);

            $file = $params['file'];
            $ext            = $file->getClientOriginalExtension();     // 得到上传文件的后缀
            $realPath       = $file->getRealPath();               //得到上传文件的tmp绝对路径

            if ($file->getSize() > 30000000) $this->throwExp(400, '上传图片尺寸过大');

            //拼接得到文件名
            $fileName =  md5(uniqid())  . '.' . $ext;
            //上传图片至阿里云
            $imgUrl = Oss::uploadFile($fileName, file_get_contents($realPath), $params['savePath']);

            if ($imgUrl) {
                return handleResult(200, 'success', [
                    'url' => $imgUrl,
                    'fileName' => $fileName
                ]);
            }else{
                $this->throwExp(400, '上传文件失败');
            }
        } catch(\Exception $e) {
            return $this->errorExp($e);
        }
    }
}
