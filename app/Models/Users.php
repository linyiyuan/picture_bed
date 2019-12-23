<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable implements JWTSubject
{
    use HasRoles; //加载角色相关信息

    protected $table = 'users';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @Author YiYuan-LIn
     * @Date: 2019/10/10
     * @enumeration:
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Builder|Model|object|null
     * @description 根据ID获取一条用户信息
     */
    public static function getOneByUid($id)
    {
        if (empty($id)) return [];

        $query = static::query();
        $query = $query->where('id', $id);

        return $query->first();
    }
}
