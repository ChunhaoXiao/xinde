<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->comment('订单号');
            $table->integer('express_id')->nullable()->comment('快递公司');
            $table->string('express_number')->nullable()->comment('快递单号');
            $table->decimal('delivery_fee')->nullable()->comment('运费');
            $table->string('payment_number')->nullable()->comment('支付流水号');
            $table->string('payment_method')->nullable()->comment('支付方式');
            $table->integer('user_id')->comment('订单所属用户');
            $table->string('status')->default(0)->comment('订单状态 0待付款 1待发货 2 待收货 3待评价 4已完成 5订单已取消 ');
            $table->decimal('total_amount')->comment('订单金额');
            $table->integer('address_id')->comment('收货地址');
            $table->string('note')->nullable()->comment('买家留言');

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
        Schema::dropIfExists('orders');
    }
}
