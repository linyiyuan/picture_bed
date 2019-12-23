<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', '25')->comment('用户名');
            $table->string('password', '100')->comment('账号密码');
            $table->tinyinteger('status')->default(1)->comment('账号状态 0-停用，1-启用');
            $table->integer('last_login')->default(0)->comment('上次登录时间');
            $table->integer('create_time')->default(0)->comment('创建时间');
            $table->string('last_ip', '15')->default(0)->comment('上次登录IP');
            $table->string('creater', '100')->default('')->comment('创建者');
            $table->string('avatar', '255')->default('')->comment('用户头像');
            $table->string('desc', '255')->default('')->comment('描述，备注');
            $table->string('mobile', '15')->default('')->comment('手机号码');
            $table->integer('code_addTime')->default(0)->comment('短信验证码添加失败');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
