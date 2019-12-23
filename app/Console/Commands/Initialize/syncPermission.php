<?php

namespace App\Console\Commands\Initialize;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class syncPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncPermission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '同步更新权限列表';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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
