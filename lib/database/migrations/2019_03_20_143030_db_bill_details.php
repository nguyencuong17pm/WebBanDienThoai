<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbBillDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_bill_details', function (Blueprint $table) {
            $table->bigIncrements('bd_id');
            $table->unsignedBigInteger('bill_id');
            $table->foreign('bill_id')->references('bill_id')->on('db_bills')->onDelete('cascade');
            $table->unsignedBigInteger('prod_id');
            $table->foreign('prod_id')->references('prod_id')->on('db_product')->onDelete('cascade');
            $table->string('bd_tensp');
            $table->integer('bd_qty');
            $table->integer('bd_gia');
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
        Schema::dropIfExists('db_bill_details');
    }
}
