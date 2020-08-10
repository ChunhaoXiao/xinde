<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->comment('订单id');
            $table->integer('goods_id')->comment('商品id');
            $table->decimal('price')->comment('商品价格(冗余数据)');
            $table->integer('quantity')->comment('商品数量');
            $table->string('name')->comment('商品名称(冗余数据)');
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
        Schema::dropIfExists('order_details');
    }
}
