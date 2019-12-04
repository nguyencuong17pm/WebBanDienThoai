<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_product', function (Blueprint $table) {
            $table->bigIncrements('prod_id');
            $table->string('prod_name');
            $table->string('prod_slug');
            $table->integer('prod_gia');
            $table->string('prod_img');
            $table->string('prod_baohanh');
            $table->string('prod_phukien');
            $table->string('prod_tinhtrang');
            $table->string('prod_khuyenmai');
            $table->tinyInteger('prod_trangthai');
            $table->text('prod_mieuta');
            $table->tinyInteger('prod_spdatbiet');
            $table->unsignedBigInteger('prod_cate');
            $table->foreign('prod_cate')
                    ->references('cate_id')->on('db_category')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('db_product');
    }
}
