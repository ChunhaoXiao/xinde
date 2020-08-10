<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwipersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swipers', function (Blueprint $table) {
            $table->id();
            $table->string('page')->comment('播放轮播图的页面');
            $table->string('picture')->comment('图片路径');
            $table->string('link')->nullable()->comment('图片链接');
            $table->integer('sort')->default(0)->comment('轮播图片排序');
            $table->boolean('status')->default(1)->comment('图片是否可用 1是 0否');
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
        Schema::dropIfExists('swipers');
    }
}
