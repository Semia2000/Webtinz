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
            $table->string('name',191);
            $table->string('description',191);
            $table->string('access_level',191);
            $table->string('typeservice',191);
            $table->string('createby',191);
            $table->integer('price')->nullable();
            $table->string('typetemplate',191);
            $table->string('productcategory',191)->nullable();
            $table->string('commerce_mode',191)->nullable();  // if it is multiple or single for ecom
            $table->string('industrie',191)->nullable();
            $table->string('thumbnail',191); // For the template preview image
            $table->string('zip_file',191); // For the template zip file
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
