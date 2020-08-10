<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('province')->comment('省');
            $table->string('city')->comment('市');
            $table->string('district')->comment('区（县）');
            $table->string('address')->comment('详细地址(街道 门牌号等)');
            $table->integer('user_id')->comment('用户id');
            $table->boolean('is_default')->default(0)->comment('是否是默认收货地址 1:是  0:否');
            $table->string('consignee')->comment('收件人姓名');
            $table->string('mobile')->comment('收件人联系电话');
            $table->enum('gender', ['男', '女'])->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
