<?php

namespace App\Http\Controllers\Api\System;

use App\Http\Controllers\Api\CommonController;
use App\Models\System\OperateLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OperateLogController extends CommonController
{
    /**
     * 请求参数
     * @var
     */
    protected $params;

    public function __construct()
    {
        $this->params = Input::all();
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/31
     * @return \Illuminate\Http\JsonResponse
     * @description 获取操作日志列表
     */
    public function getList()
    {
        try {
            //初始化Model
            $query = OperateLog::query();

            //筛选条件
            if (!empty($this->params['uid'])) $query->where('uid', $this->params['uid']);
            if (!empty($this->params['action'])) $query->where('action', 'like', '%' .$this->params['action'] . '%');
            if (!empty($this->params['time'])) {
                $startTime = $this->params['time'][0] ?? '';
                $endTime =   $this->params['time'][1] ?? '';
                $query->whereBetween('created_at', [date('Y-m-d',strtotime($startTime)), date('Y-m-d', strtotime($endTime) + 86400)]);
            }

            //统计总条数
            $count = $query->count();
            //分页
            $query = $this->pagingCondition($query, $this->params);

            $list = $query->orderBy('id', 'desc')->get()->toArray();

            return handleResult(200, 'success', [
                'list' => $list,
                'total' => $count
            ]);
        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }
}
