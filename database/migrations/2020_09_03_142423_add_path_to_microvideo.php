<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPathToMicrovideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('micro_videos', function (Blueprint $table) {
            $table->string('path')->nullable()->comment('本地上传的视频文件地址');
            $table->string('url')->nullable()->comment('远程视频链接')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('micro_videos', function (Blueprint $table) {
            $table->dropColumn('path');
            $table->string('url')->comment('远程视频链接')->change();
        });
    }
}
