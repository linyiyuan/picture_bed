<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 添加权限
     * @return void
     */
    public function run()
    {
        $allPermissions = config('permissions');

        DB::beginTransaction();

        foreach ($allPermissions as $key => $value) {
            $permission = new Permission();
            $permission->id = $value['id'];
            $permission->name = $value['name'];
            $permission->display_name = $value['display_name'];
            $permission->is_display = $value['is_display'];
            $permission->pid = $value['pid'];

            $permissionExist = Permission::where('name',$value['name'])->first();
            if (!$permissionExist) {
                echo '添加新的一条新权限'.'....................................'.$value['display_name'].PHP_EOL;
                $permission->save();
            }else{
                echo $value['display_name'].'....................................该权限已经存在'.PHP_EOL;
            }

        }

        DB::commit();

    }
}
