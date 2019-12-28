<?php

namespace App\Http\Controllers\Web\Photo;

use App\Http\Controllers\Web\CommonController;
use App\Http\Utils\PageShow;
use App\Models\Photo\Photo;
use App\Models\Photo\PhotoAlbum;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class PhotoController extends CommonController
{
    /**
     * 请求参数
     * @var
     */
    protected $params;

    /**
     * PhotoController constructor.
     */
    public function __construct()
    {
        $this->params = Input::all();
    }

    /**
     * 获取相册列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function getPhotoAlbumList()
    {
        try {
            $query = PhotoAlbum::query();
            $total = $query->count();

            $cur_page   = $this->params['cur_page'] ?? 1;
            $page_size  = 16;
            $offset = ($cur_page- 1) * $page_size;
            $query = $query->offset($offset)->limit($page_size);

            $list = $query->where('album_status', 1)->get()->toArray();

            return view('photo_list', [
                'list' => $list,
                'pageShow' => PageShow::pageShow(intval($cur_page), intval($page_size), intval($total))
            ]);
        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }

    /**
     * 根据相册ID获取图片列表
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function getPhotoList($id)
    {
        try {
            if (!intval($id)) return redirect('/photo_list')->with('message',['code' => 400, 'message' => '参数错误']);

            $answer = $this->params['answer'] ?? '';
            $query = Photo::query();

            $photoAlbum = PhotoAlbum::query()->where('id', $id)->first();
            if (empty($photoAlbum)) return redirect('/photo_list')->with('message',['code' => 400, 'message' => '该相册不存在']);

            //判断是否需要密码校验
            if ($photoAlbum['album_type'] == 2) {
                if (Cookie::get('photo_album_' . $id)) {
                    if (!Hash::check($photoAlbum['album_answer'], Cookie::get('photo_album_' . $id))) {
                        if ($answer != $photoAlbum['album_answer']) return redirect('/photo_list')->with('message',['code' => 400, 'message' => '输入密码错误']);
                    }
                }else{
                    if ($answer != $photoAlbum['album_answer']) return redirect('/photo_list')->with('message',['code' => 400, 'message' => '输入密码错误']);
                }
            }

            $hashKey = Hash::make($photoAlbum['album_answer']);
            Cookie::queue('photo_album_' . $id, $hashKey, 60);

            $query = $query->where('photo_album', $id);
            $total = $query->count();
            $cur_page   = $this->params['cur_page'] ?? 1;
            $page_size  = 16;

            $offset = ($cur_page- 1) * $page_size;
            $query = $query->offset($offset)->limit($page_size);
            $list = $query->orderBy('album_sort', 'asc')->get()->toArray();

            return view('photo_detail', [
                'list' => $list,
                'pageShow' => PageShow::pageShow(intval($cur_page), intval($page_size), intval($total))
            ]);
        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }

    public function getPersonal()
    {
        return view('personal');
    }

    public function test()
    {
        return view('test');
    }
}
