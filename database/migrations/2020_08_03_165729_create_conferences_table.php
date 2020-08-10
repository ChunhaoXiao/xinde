<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->integer("article_id");
            $table->text("introduction")->nullable()->comment('会务简介');
            $table->string("address")->comment('会务地点');
            $table->text("content")->comment("会务详情");
            $table->dateTime("start_date");
            $table->dateTime("end_date")->nullable();
            $table->dateTime("enroll_begin_time")->nullable();
            $table->dateTime("enroll_end_time")->nullable();
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
        Schema::dropIfExists('conferences');
    }
}
