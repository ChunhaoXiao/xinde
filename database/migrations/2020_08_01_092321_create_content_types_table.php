<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('内容模型名称');
            $table->string('identity')->comment('唯一标识,只能使用字母');
            //$table->string('table')->comment('数据存放的表');
            $table->string('model')->comment('模型');
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
        Schema::dropIfExists('content_types');
    }
}
