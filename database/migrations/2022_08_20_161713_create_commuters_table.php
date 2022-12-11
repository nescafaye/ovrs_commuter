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
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('phone', '12')->unique()->nullable();
            $table->enum('gender', ['Female', 'Male', 'Others'])->nullable();
            $table->string('profilePic')->nullable();
            $table->string('accNumber', '12')->nullable();
            $table->string('accName')->nullable();
            $table->string('auth_type')->nullable();
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
        Schema::dropIfExists('commuters');
    }
};
