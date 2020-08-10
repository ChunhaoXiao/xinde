<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('文章标题');
            //$table->mediumText('content')->comment('文章内容');
            $table->string('cover')->nullable()->comment('封面图');
            $table->string('video')->nullable()->comment('视频地址');
            $table->string('source')->nullable()->comment('文章来源');
            $table->integer('user_id')->nullable()->comment('发布者');
            $table->integer('column_author_id')->nullable()->comment('专栏作者id');
            $table->integer('category_id')->comment('文章所属分类');
            $table->integer('views')->default(0)->comment('浏览次数');
            $table->boolean('status')->default(1)->comment('状态 1:已发布 0：未发布');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
            
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
        Schema::dropIfExists('articles');
    }
}
