<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_comment', function (Blueprint $table) {
            $table->bigIncrements('com_id');
            $table->string('com_email');
            $table->string('com_name');
            $table->string('com_content');
            $table->unsignedBigInteger('com_prod');
            $table->foreign('com_prod')->references('prod_id')->on('db_product')->onDelete('cascade');
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
        Schema::dropIfExists('db_comment');
    }
}
