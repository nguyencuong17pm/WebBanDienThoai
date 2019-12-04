<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbKhuyenmai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_khuyenmai', function (Blueprint $table) {
            $table->bigIncrements('km_id');
            $table->string('km_name');
            $table->string('km_slug');
            $table->string('km_img');
            $table->text('km_link');
            $table->tinyInteger('km_trangthai');
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
        Schema::dropIfExists('db_khuyenmai');
    }
}
