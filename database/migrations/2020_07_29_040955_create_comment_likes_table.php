<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_likes', function (Blueprint $table) {
            $table->id();
            //$table->integer('comment_id')->comment('被点赞的评论');
            $table->string('likeable_type')->comment('点赞的内容类型'); //polimorphy
            $table->integer('likeable_id')->comment('点赞的内容id'); //polimorphy
            $table->integer('user_id')->comment('点赞者');
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
        Schema::dropIfExists('comment_likes');
    }
}
