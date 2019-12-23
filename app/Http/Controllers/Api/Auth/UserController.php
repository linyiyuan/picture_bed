<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\CommonController;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

/**
 * Class UserController
 * @package App\Http\Controllers\Api\Auth
 * @Author YiYuan-LIn
 * @Date: 2019/5/11
 * 用户资源控制器
 */
class UserController extends CommonController
{
    /**
     * 请求参数
     * @var
     */
    protected $params;

    /**
     * UserController constructor.
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
     * @description 用户列表
     */
    public function index(Request $request)
    {
        try {
            $type = $this->params['type'] ?? '';

            switch ($type) {
                case 'getOne' :
                    $data = $this->getOne();
                    break;
                default :
                    $data = $this->getList();
                    break;
            }

            return handleResult(200, 'success', $data);
        } catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/10/10
     * @enumeration:
     * @return array|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     * @throws \Exception
     * @description 获取一条用户信息
     */
    public function getOne()
    {
        $id = $this->params['id'];
        if (empty($id)) $this->throwExp(400, 'Id 不允许为空');

        $userInfo = Users::getOneByUid($id);
        $userInfo['roleData'] = $userInfo->getRoleNames();

        return $userInfo;
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/10/10
     * @enumeration:
     * @description 获取用户列表
     */
    public function getList()
    {
        $query = Users::query();

        $total  = $query->count();
        $query  = $this->pagingCondition($query, $this->params);

        //处理查询条件
        if (!empty($this->params['username'])) $query->where('username', 'like', '%' .$this->params['username'] . '%');
        $data   = $query->get();

        //循环处理数组
        foreach ($data as $key => $value) {
            $data[$key]['roleData'] = $value->getRoleNames();
        }

        return [
            'list' => $data,
            'total' => $total
        ];
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/7
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @description 添加用户
     */
    public function store(Request $request)
    {
        try {
            $data = $request->postData;

            $params = [
                'username'  => $data['username'],
                'password'  => $data['password'],
                'password_confirmation' => $data['password_confirmation'],
                'status'    => $data['status'] ?? 1,
                'mobile'    => $data['mobile'],
                'roleData'  => $data['roleData'],
            ];
            //配置验证
            $rules = [
                'username'  => 'required|min:4|max:18|unique:users',
                'password'  => 'required|confirmed:password_confirmation',
                'password_confirmation' => 'required',
                'status'    => 'required',
                'mobile'    => 'required',
                'roleData'  => 'required|array',
            ];
            //错误信息
            $message = [
                'username.required' => '[username]缺失',
                'username.unique' => '该用户名已经存在',
                'password.required' => '[password]缺失',
                'confirm_password.required' => '[confirm_password]缺失',
                'roleData.required' => '[roleData]缺失',
                'roleData.array' => '[roleData]必须为数组',
                'username.min' => '[username]最少4位',
                'username.max' => '[username]最多18位',
                'password.confirmed' => '两次密码输入不一致',
                'mobile.confirmed' => '手机号码不能为空',
            ];

            $this->verifyParams($params, $rules, $message);

            DB::beginTransaction();

            $user = new Users();
            $user->username = $data['username'];
            $user->password = md5($data['password']);
            $user->status   = $data['status'] ?? '1';
            $user->avatar   = $data['avatar'] ?? 'http://landlord-res.oss-cn-shenzhen.aliyuncs.com/admin_face/face' . rand(1,10) .'.png';
            $user->last_login   = time();
            $user->create_time  = time();
            $user->last_ip      = getClientIp();
            $user->creater      = $data['creater'] ?? '无';
            $user->desc         = $data['desc'] ?? '';
            $user->mobile       = $data['mobile'] ?? '';

            if (!$user->save()) $this->throwExp(400, '添加用户失败');

            foreach ($data['roleData'] as $key) {
                $user->assignRole($key);
            }
            DB::commit();

            //正确返回信息
            return handleResult(200, '添加用户成功');
        } catch (\Exception $e) {
            return $this->errorExp($e);
        }
    }


    /**
     * @Author YiYuan-LIn
     * @Date: 2019/5/11
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @description 修改用户
     */
    public function update(Request $request, $id)
    {
        try {
            if (empty($id)) $this->throwExp(400, 'ID 不能为空');
            $data = $request->postData;

            $params = [
                'status'    => $data['status'] ?? 1,
                'mobile'    => $data['mobile'] ?? '',
                'roleData'  => $data['roleData'] ?? '',
            ];
            //配置验证
            $rules = [
                'status'    => 'required',
                'mobile'    => 'required',
                'roleData'  => 'required|array',
            ];
            //错误信息
            $message = [
                'roleData.required' => '[roleData]缺失',
                'roleData.array' => '[roleData]必须为数组',
                'username.min' => '[username]最少4位',
                'username.max' => '[username]最多18位',
                'password.confirmed' => '两次密码输入不一致',
                'mobile.confirmed' => '手机号码不能为空',
            ];

            // 表单验证
            $this->verifyParams($params, $rules, $message);

            //开始事务
            DB::beginTransaction();

            $user = Users::find($id);
            $user->status   = $data['status'] ?? '1';
            $user->avatar   = $data['avatar'] ?? 'http://landlord-res.oss-cn-shenzhen.aliyuncs.com/admin_face/face' . rand(1,10) .'.png';
            $user->desc     = $data['desc'] ?? '';
            $user->mobile   = $data['mobile'] ?? '';

            if (!$user->save()) $this->throwExp('修改用户失败');

            //将所有角色移除
            DB::table('model_has_roles')
                ->where('model_id', $id)
                ->delete();

            foreach ($params['roleData'] as $key => $val) {
                $user->assignRole($val);
            }

            //提交事务
            DB::commit();

            //正确返回信息
            return handleResult(200, '修改用户成功');
        } catch (\Exception $e) {
            return $this->errorExp($e);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!intval($id)) return handleResult(500, '参数错误');

        if (!Users::destroy($id)) return handleResult(500, '删除失败');


        return handleResult(200, '删除成功');
    }
}
