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
        Schema::create('customrequests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('typerequest');
            $table->string('request');
            $table->Integer('user_id');
            $table->string('status')->default(0);;
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
        Schema::dropIfExists('customrequests');
    }
};
