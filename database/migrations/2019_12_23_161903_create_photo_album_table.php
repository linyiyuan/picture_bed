<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_album', function (Blueprint $table) {
            $table->increments('id');
            $table->string('album_name')->default('')->comment('相册名');
            $table->string('album_desc',500)->default('')->comment('相册描述');
            $table->string('album_cover',500)->default('')->comment('相册封面图');
            $table->integer('album_type')->default('0')->comment('相册分类');
            $table->string('album_author',255)->default('')->comment('相册作者');
            $table->integer('album_click_num')->default('0')->comment('相册浏览数');
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
        Schema::dropIfExists('photo_album');
    }
}
