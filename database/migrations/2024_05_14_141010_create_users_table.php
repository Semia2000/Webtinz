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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',191)->nullable();
            $table->string('lastname',191)->nullable();
            $table->string('email',191)->unique();
            $table->boolean('is_otp_validate')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',191);
            $table->integer('status')->default(1);
            $table->string('tel',191)->nullable();
            $table->foreignId('role_id')->default(1);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('otpcode',191);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
