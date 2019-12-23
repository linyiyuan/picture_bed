<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Api\CommonController;
use App\Models\Server\ChannelInfo;
use App\Models\Server\PlatFormInfo;
use App\Models\Technique\PayTypeConf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ConfigService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Role;

/**
 * Class QueryCriteriaController
 * @package App\Http\Controllers\Api\Common
 * @Author YiYuan-LIn
 * @Date: 2019/6/4
 * 公共查询条件项
 */
class QueryCriteriaController extends CommonController
{
    /**
     * 请求参数
     * @var
     */
    protected $params;

    /**
     * QueryCriteriaController constructor.
     */
    public function __construct()
    {
        $this->params = Input::all();
    }


}
