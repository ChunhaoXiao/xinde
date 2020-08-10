<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfterSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->comment('订单id');
            $table->integer('order_detail_id')->comment('订单详情id');
            $table->integer('goods_id')->comment('商品id');
            $table->integer('user_id')->comment('用户id');
            $table->tinyInteger('status')->default(0)->comment('当前状态 0待确认, 1待退货(已确认), 2待审核(已收到退货), 3已完成, 4已拒绝, 5已取消(用户取消了售后)');
            $table->tinyInteger('type')->default(0)->comment('业务类型 0仅退款 1退货退款');
            $table->string('refund_reason')->nullable()->comment('申请售后的原因');
            $table->integer('quantity')->default(0)->comment('退货数量');
            $table->decimal('total_amount')->default(0)->comment('退款金额');
            $table->string('images')->nullable()->comment('图片');
            $table->string('refuse_reason')->nullable()->comment(' 拒绝售后原因');
            $table->string('express_name')->nullable()->comment('快递名称');
            $table->string('express_number')->nullable()->comment('快递单号');
            $table->dateTime('confirm_time')->nullable()->comment('确认时间(确认用户提交的售后申请)');
            $table->dateTime('delivery_time')->nullable()->comment('退货时间');
            $table->dateTime('audit_time')->nullable()->comment('审核时间（同意退货或拒绝退货）');
            $table->dateTime('cancel_time')->nullable()->comment('用户取消售后的时间');
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
        Schema::dropIfExists('after_sales');
    }
}
