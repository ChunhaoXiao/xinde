<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('栏目名称')->unique();
            $table->integer('content_type_id')->comment('内容类型 如：普通文章、图片集');
            $table->string('icon')->nullable()->comment('分类图标');
            $table->integer('parent_id')->nullable()->comment('上级栏目（父栏目）');
            $table->integer('sort')->default(0)->comment('排序');
            $table->boolean('is_show')->default(1)->comment('前端是否显示  1：是 0： 否');
            $table->softDeletes('deleted_at', 0)->comment('删除时间');
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
        Schema::dropIfExists('categories');
    }
}
