<?php

namespace App\Http\Controllers\Web\Photo;

use App\Http\Controllers\Web\CommonController;
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

    public function getPhotoAlbumList()
    {
        try {
            $query = PhotoAlbum::query();
            $list = $query->get()->toArray();


            return view('photo_list', [
                'list' => $list
            ]);
        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }

    public function getPhotoList($id)
    {
        try {
            if (!intval($id)) $this->throwExp(500, '参数错误');

            $query = Photo::query();
            $query = $query->where('photo_album', $id);
            $list = $query->get()->toArray();

            return view('photo_detail', [
                'list' => $list
            ]);
        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }
}
