<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Api\CommonController;
use App\Http\Services\ConfigService;
use App\Models\Setting\GoodList;
use App\Models\Setting\PropSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

/**
 * Class ConfigController
 * @package App\Http\Controllers\Api\Common
 * @Author YiYuan-LIn
 * @Date: 2019/6/11
 * 获取一些相应配置表
 */
class ConfigController extends CommonController
{
    /**
     * 请求参数
     * @var
     */
    protected $params;

    /**
     * ConfigController constructor.
     */
    public function __construct()
    {
        $this->params = Input::all();
    }
}
