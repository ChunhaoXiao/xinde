<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferenceEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_enrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('conference_id')->comment('会议id');
            $table->integer('user_id')->comment('参与者id');
            $table->string('mobile')->comment('联系电话');
            $table->string('name')->comment('报名人姓名');
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
        Schema::dropIfExists('conference_enrolls');
    }
}
