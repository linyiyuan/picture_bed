<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Users
 * @package App\Models\User
 * @Author YiYuan-LIn
 * @Date: 2019/6/5
 * 用户模型
 */
class Users extends Model
{
    /**
     * 数据库连接
     * @var
     */
    protected $connection = 'center';

    /**
     * 数据库表
     * @var
     */
    protected $table = 'user_info';

    /**
     * 时间戳自动更新开关
     * @var
     */
    public $timestamps = false;
}
