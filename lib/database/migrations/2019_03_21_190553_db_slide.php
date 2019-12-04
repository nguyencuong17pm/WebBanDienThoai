<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbSlide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_slide', function (Blueprint $table) {
            $table->bigIncrements('s_id');
            $table->string('s_name');
            $table->string('s_slug');
            $table->string('s_img');
            $table->tinyInteger('s_trangthai');
            $table->text('s_link');
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
        Schema::dropIfExists('db_slide');
    }
}
