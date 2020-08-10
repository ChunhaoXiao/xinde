<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->integer('position_id')->comment('广告位置');
            $table->dateTime('start_time')->nullable()->comment('广告开始时间');
            $table->dateTime('end_time')->nullable()->comment('广告结束时间');
            $table->string('content')->comment('广告内容');
            $table->string('link')->nullable()->comment('链接地址');
            $table->boolean('is_show')->default(1)->comment('是否显示 1:是 0:否');
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
        Schema::dropIfExists('advertisements');
    }
}
