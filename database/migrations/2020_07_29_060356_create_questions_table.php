<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('content')->comment('问题内容');
            $table->string('pictures')->nullable()->comment('图片');

            $table->integer('user_id')->comment('提问人');
            $table->integer('category_id')->comment('问题所属分类');
            $table->integer('expert_id')->nullable()->comment('专家id');
            $table->integer('payment_amount')->default()->comment('悬赏金额');
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
        Schema::dropIfExists('questions');
    }
}
