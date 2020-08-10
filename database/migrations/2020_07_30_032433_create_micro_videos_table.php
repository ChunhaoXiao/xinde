<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micro_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('标题');
            $table->integer('category_id')->comment('分类');
            $table->string('source')->nullable()->comment('来源');
            $table->string('url')->comment('视频播放地址');
            $table->text('description')->nullable()->comment('描述');
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
        Schema::dropIfExists('micro_videos');
    }
}
