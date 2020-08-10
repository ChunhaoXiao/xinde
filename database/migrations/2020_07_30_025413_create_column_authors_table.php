<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('column_authors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('专栏作家名字');
            $table->string('avatar')->nullable()->comment('作家头像');
            $table->text('introduction')->comment('简介');
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
        Schema::dropIfExists('column_authors');
    }
}
