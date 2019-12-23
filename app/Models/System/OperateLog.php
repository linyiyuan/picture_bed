<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class OperateLog extends Model
{
    /**
     * 数据库表
     * @var
     */
    protected $table = 'operate_log';

    /**
     * 时间戳自动更新开关
     * @var
     */
    public $timestamps = true;

}
