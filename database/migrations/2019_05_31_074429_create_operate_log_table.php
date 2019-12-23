<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operate_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action', 255)->comment('操作')->default('');
            $table->string('data', 500)->comment('参数')->default('');
            $table->string('username', 255)->comment('操作人账号')->default('');
            $table->string('operator', 255)->comment('操作人描述')->default('');
            $table->string('dealResult', 255)->comment('处理结果')->default('');
            $table->integer('uid')->comment('操作人ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operate_log');
    }
}
