<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->decimal('payment')->comment('回答提问的价格');
            $table->string('mobile');
            $table->string('wechat')->nullable()->comment('微信号');
            $table->string('alipay')->nullable()->comment('支付宝');
            $table->string('area')->nullable()->comment('所在地区');
            $table->string('title')->nullable()->comment('头衔');
            $table->text('introduction')->nullable()->comment('自我介绍');
            $table->integer('category_id')->comment('问题分类');
            $table->boolean('is_veryfied')->default(0)->comment('是否通过审核 0:未通过 1:已通过');
            $table->integer('user_id')->comment('用户id');
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
        Schema::dropIfExists('apply_experts');
    }
}
