<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * 角色模型
 */
class RoleInfo extends Model
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
    protected $table = 'role_info';

    /**
     * 时间戳自动更新开关
     * @var
     */
    public $timestamps = false;
}
