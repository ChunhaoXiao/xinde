<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('goods_id')->comment('商品id');
            $table->integer('user_id')->comment('评论者id');
            $table->integer('order_id')->comment('订单id');
            $table->text('content')->comment('评价内容');
            $table->string('grade')->nullable()->comment('评价等级、星级');
            $table->string('pictures')->nullable()->comment('评论图片（晒图）');
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
        Schema::dropIfExists('goods_comments');
    }
}
