<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymenthistorys', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_id');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('payment_date');
            $table->float('amount');
            $table->String('paymentmethod');
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
        Schema::dropIfExists('paymenthistorys');
    }
};
