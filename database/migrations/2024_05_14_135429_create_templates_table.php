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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('access_level');
            $table->string('typeservice');
            $table->string('commerce_mode')->nullable();  // if it is multiple or single for ecom
            $table->string('industrie');
            $table->string('thumbnail'); // For the template preview image
            $table->string('zip_file'); // For the template zip file
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
        Schema::dropIfExists('websitetemplates');
    }
};
