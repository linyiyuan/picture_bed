<?php

namespace App\Http\Controllers\Api;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use JWTAuth;
use JWTFactory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestController extends CommonController
{
    public function test()
    {
        $payTypeConf = config('inc.payTypeConf');

        dd($payTypeConf);

    }
}
