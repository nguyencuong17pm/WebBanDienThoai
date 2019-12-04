<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_bills', function (Blueprint $table) {
            $table->bigIncrements('bill_id');
            $table->unsignedBigInteger('cus_id');
            $table->foreign('cus_id')->references('cus_id')->on('db_customers')->onDelete('cascade');
            $table->tinyInteger('bill_trangthai');
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
        Schema::dropIfExists('db_bills');
    }
}
