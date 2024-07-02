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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('service_type'); // 'ecommerce' or 'website'
            $table->string('description')->nullable();
            $table->string('products_services')->nullable();
            $table->string('sector')->nullable();
            $table->string('others_services')->nullable();
            $table->string('productcategory')->nullable();
            $table->string('commerce_mode')->nullable();  // if it is multiple or single for ecom
            $table->unsignedBigInteger('template_id')->nullable();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            
            // project assignment
            $table->unsignedBigInteger('sales_id')->nullable();
            $table->foreign('sales_id')->references('id')->on('users');// sales_id tech_id
            $table->unsignedBigInteger('tech_id')->nullable();
            $table->foreign('tech_id')->references('id')->on('users');// sales_id tech_id
            // end project assignment

            $table->foreign('template_id')->references('id')->on('templates');
            $table->foreign('subscription_id')->references('id')->on('subscriptionplans');
            $table->boolean('is_pay_done')->default(false);
            $table->boolean('is_deployed')->default(false);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        });
    } // 2024_05_29_143515_create_services_table

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
