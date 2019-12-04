<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_customers', function (Blueprint $table) {
            $table->bigIncrements('cus_id');
            $table->string('cus_name');
            $table->string('cus_email');
            $table->integer('cus_phone');
            $table->string('cus_diachi');
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
        Schema::dropIfExists('db_customers');
    }
}
