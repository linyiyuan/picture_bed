<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

/**
 * Class UserRoleTableSeeder
 * @Author YiYuan-LIn
 * @Date: 2019/7/29
 * 后台默认用户数据填充
 */
class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初始化添加一个默认用户以及一个超级管理员角色
        $params = [
            'username' => 'admin@admin.com',
            'password' =>  md5('admin@admin.com'),
            'status'   => 1,
            'last_login' => time(),
            'create_time' => time(),
            'desc' => '超级用户',
            'mobile' => '13211035441',
            'avatar' => env("APP_URL") . '/images/face/face' . rand(1,10) .'.png'
        ];

        DB::beginTransaction();

        $user = \App\Models\Users::create($params);

        if (!$user) die('创建默认用户失败');

        $super_role = [
            'name' => 'super_admin',
            'guard_name' => 'web',
            'description' => '超级管理员'
        ];

        $default_role = [
            'name' => 'default_admin',
            'guard_name' => 'web',
            'description' => '普通管理员'
        ];

        $default_role = Role::create($default_role);
        $super_role   = Role::create($super_role);
        if (!$super_role)   die('创建默认角色失败');
        if (!$default_role) die('创建默认角色失败');

        //添加默认角色到默认用户
        $res = $user->assignRole($super_role->name);
        if (!$res) die('初始化用户失败');

        DB::commit();
       echo '初始化用户成功' . PHP_EOL . '默认用户名：admin@admin.com' . PHP_EOL . '默认密码：admin@admin.com' . PHP_EOL;exit;
    }
}
