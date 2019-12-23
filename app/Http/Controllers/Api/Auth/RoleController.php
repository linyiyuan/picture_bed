<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Role;

class RoleController extends CommonController
{
    /**
     * 请求参数
     * @var
     */
    protected $params;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->params = Input::all();
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/7
     * @param Request $request
     * @return mixed
     * @description 角色列表
     */
    public function index(Request $request)
    {
        try {
            $type  = $this->params['type'] ?? '';

            switch ($type) {
                case 'tree' :
                    $data = $this->getTreeList();
                    break;
                default :
                    $data = $this->getList();
            }

            return handleResult(200, '', $data);
        } catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/10/10
     * @enumeration:
     * @return array
     * @description 获取角色名对应角色描述的树状列表
     */
    public function getTreeList()
    {
        $query = Role::query();
        $tree = $query->select('name', 'description')->get()->toArray();
        $tree = array_column($tree, 'description', 'name');

        return $tree;
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/10/10
     * @enumeration:
     * @return array
     * @description 获取角色列表
     */
    public function getList()
    {
        $query = Role::query();

        $total  = $query->count();
        $query  = $this->pagingCondition($query, $this->params);

        //判断是否有查询条件
        if(!empty($this->params['description'])) $query->where('description', 'like', '%' . $this->params['description'] . '%');
        $data   = $query->get();

        //循环给予每个角色一个权限数组
        foreach ($data as $key => $value) {
            $allowPermissions = $value->getAllPermissions()->toArray();
            $data[$key]['allPermissions'] = $allowPermissions;
        }

        return [
            'list' => $data,
            'total' => $total,
        ];
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/7
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @description 添加角色
     */
    public function store(Request $request)
    {
        try {
            $postData = $request->postData;
            $params = [
                'name'          => $postData['name'],
                'description'   => $postData['description']
            ];
            //配置验证
            $rules = [
                'name' => 'required',
            ];
            $message = [
                'name.required' => '[name]缺失',
            ];

            $this->verifyParams($params, $rules, $message);

            if (!Role::create($params)) $this->throwExp(400, '添加角色失败');

            return handleResult(200, '添加角色成功');
        } catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/10/10
     * @enumeration:
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @description 更新角色信息
     */
    public function update(Request $request, $id)
    {
        try {
            if (!intval($id)) $this->throwExp('未知id参数');

            $postData = $request->postData;
            $params = [
                'name'          => $postData['name'],
                'description'   => $postData['description']
            ];
            //配置验证
            $rules = [
                'name' => 'required',
            ];
            $message = [
                'name.required' => '[name]缺失',
            ];

            $this->verifyParams($params, $rules, $message);

            if (!Role::where('id', $id)->update($params)) $this->throwExp('400','修改角色信息失败');

            //正确返回信息
            return handleResult(200, '修改角色信息成功');
        } catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }
}
