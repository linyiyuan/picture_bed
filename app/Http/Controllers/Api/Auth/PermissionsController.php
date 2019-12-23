<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class PermissionsController
 * @package App\Http\Controllers\Api\Auth
 * @Author YiYuan-LIn
 * @Date: 2019/5/13
 * 后台权限控制器
 */
class PermissionsController extends CommonController
{
    /**
     * 请求参数
     * @var
     */
    protected $params;

    /**
     * PermissionsController constructor.
     */
    public function __construct()
    {
        $this->params = Input::all();
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/7
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @description 获取权限列表
     */
    public function index(Request $request)
    {
        try {
            $type = $this->params['type'] ?? '';

            switch ($type) {
                case 'tree' :
                    $data = $this->getTree();
                    break;
                default :
                    $data = $this->getList();
                    break;
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
     * @description 获取权限列表（树状）
     */
    public function getTree()
    {
        $query = Permission::query();
        $list = $query->orderBy('pid')->select('id', 'name', 'display_name', 'pid', 'is_display')->get()->toArray();
        $list = array_column($list, null, 'id');

        //使用引用传递递归数组
        $permissionList = array();
        foreach($list as $key => $value){
            if(isset($list[$value['pid']])){
                $list[$value['pid']]['children'][] = &$list[$key];
            }else{
                $permissionList[] = &$list[$key];
            }
        }

        return ['list' => $permissionList];
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/10/11
     * @enumeration:
     * @return array
     * @description 获取权限列表（分页）
     */
    public function getList()
    {
        if (!empty($this->params['role_id'])){
            $role = Role::where('id', $this->params['role_id'])->first();

            //根据角色获取相应的权限列表
            $permissionList = $role->getAllPermissions()->toArray();
            $permissionList = array_column($permissionList, 'name');

            $total = count($permissionList);

        }else{
            $query = Permission::query();

            $total = $query->count();
            $query = $this->pagingCondition($query, $this->params);

            $permissionList = $query->get()->toArray();
        }

        return [
            'total' => $total,
            'list' => $permissionList
        ];
    }


    /**
     * @Author YiYuan-LIn
     * @Date: 2019/6/3
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @description 添加权限
     */
    public function store(Request $request)
    {
        try {
            $postData = $request->postData;

            $params = [
                'name' => $postData['name'] ?? '',
                'display_name' => $postData['display_name'] ?? '',
            ];

            $rules = [
                'name'            => 'required',
                'display_name'  => 'required',
            ];
            $message = [
                'name.required'           => '权限名 必填',
                'display_name.required' => '权限描述必填',
            ];

            $this->verifyParams($params, $rules, $message);

            $permission = new Permission();
            $permission->name           = $postData['name'];
            $permission->display_name   = $postData['display_name'];
            $permission->pid            = $postData['pid'] ?? 0;
            $permission->is_display     = $postData['is_display'] ?? 1;

            if (!$permission->save()) $this->throwExp(400,'添加权限失败');

            return handleResult(200, '添加权限成功');

        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/6/3
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @description 修改权限
     */
    public function update(Request $request, $id)
    {
        try {
            $postData = $request->postData;
            $params = [
                'id' => $id,
                'name' => $postData['name'] ?? '',
                'pid'  => $postData['pid'] ?? '',
                'display_name' => $postData['display_name'] ?? '',
            ];

            //配置验证
            $rules = [
                'name' => 'required',
                'id' => 'required',
                'display_name' => 'required',
                'pid' => 'required',
            ];

            $message = [
                'id.required' => '非法ID',
                'name.required' => '权限名 必填',
                'display_name.required' => '权限描述必填',
                'pid.required' => 'pid 参数不能为空',
            ];

            $this->verifyParams($params, $rules, $message);

            $permission = Permission::where('id', $id)->first();
            $permission->name           = $postData['name'];
            $permission->display_name   = $postData['display_name'];
            $permission->pid            = $postData['pid'];
            $permission->is_display     = $postData['is_display'] ?? 1;

            if (!$permission->save()) $this->throwExp(400, '修改权限失败');

            return handleResult(200, '修改权限成功');
        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/6/3
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @description 删除权限
     */
    public function destroy($id)
    {
        try {
            if (!intval($id)) $this->throwExp(400,' 参数错误');

            $subPermission = Permission::where('pid', $id)->get()->isEmpty();
            if (!$subPermission) $this->throwExp(400, '不可删除，该权限下存在子权限');

            if (!Permission::destroy($id)) $this->throwExp(400, '删除权限失败');

            return handleResult(200, '删除成功');
        }catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }
}
