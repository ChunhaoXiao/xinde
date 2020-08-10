<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('商品名称');
            $table->decimal('market_price')->nullable()->comment('原价');
            $table->decimal('price')->comment('商品价格(店铺价格)');
            $table->string('subtitle')->nullable()->comment('副标题');
            $table->string('cover')->nullable()->comment('产品封面图');
            $table->integer('virtual_sales')->default(0)->comment('虚拟销量');
            $table->boolean('on_sale')->default(1)->comment('是否上架 1:上架 2：下架');
            $table->integer('stock')->default(0)->comment('库存');
            $table->boolean('is_new')->default(0)->comment('是否是新品');
            $table->boolean('is_recommend')->default(0)->comment('是否推荐');
            $table->boolean('is_hot')->default(0)->comment('是否热卖');
            $table->boolean('is_discount')->default(0)->comment('是否促销');
            $table->text('description')->nullable()->comment('商品描述');
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
        Schema::dropIfExists('goods');
    }
}
