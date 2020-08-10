<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specials', function (Blueprint $table) {
            $table->id();
            $table->integer('arrticle_id')->comment('文章id');
            $table->string('title')->comment('专题节点名称');
            $table->string("selected_article_ids")->nullable()->comment('专题节点选择的文章');
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
        Schema::dropIfExists('specials');
    }
}
