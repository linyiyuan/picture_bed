<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToPhotoAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo_album', function (Blueprint $table) {
            $table->string('album_question', 500)->default('')->comment('访问相册的问题');
            $table->string('album_answer', 500)->default('')->comment('访问相册的密码');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photo_album', function (Blueprint $table) {
            //
        });
    }
}
