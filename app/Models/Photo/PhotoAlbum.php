<?php

namespace App\Models\Photo;

use Illuminate\Database\Eloquent\Model;

class PhotoAlbum extends Model
{
    /**
     * 数据库表
     * @var
     */
    protected $table = 'photo_album';

    /**
     * 时间戳自动更新开关
     * @var
     */
    public $timestamps = true;
}
