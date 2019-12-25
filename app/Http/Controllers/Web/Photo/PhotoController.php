<?php

namespace App\Http\Controllers\Web\Photo;

use App\Http\Controllers\Web\CommonController;
use App\Http\Utils\PageShow;
use App\Models\Photo\Photo;
use App\Models\Photo\PhotoAlbum;
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

            $list = $query->get()->toArray();


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
            if (!intval($id)) $this->throwExp(500, '参数错误');

            $query = Photo::query();
            $total = $query->count();

            $query = $query->where('photo_album', $id);
            $cur_page   = $this->params['cur_page'] ?? 1;
            $page_size  = 16;

            $offset = ($cur_page- 1) * $page_size;
            $query = $query->offset($offset)->limit($page_size);
            $list = $query->get()->toArray();

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
}
