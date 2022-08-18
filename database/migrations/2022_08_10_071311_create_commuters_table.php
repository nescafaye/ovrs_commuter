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
        Schema::create('commuters', function (Blueprint $table) {
            $table->id('comm_id');
            $table->string('comm_fname');
            // $table->string('comm_mname')->nullable();
            $table->string('comm_lname');
            $table->string('comm_un')->unique();
            $table->string('comm_mail');
            $table->string('comm_phone')->unique()->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commuters');
    }
};
