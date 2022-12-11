<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // public $incrementing = false; 
    // public $keyType = 'string';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plateNo')->unique();

            $table->foreignId('assignedDriver')
            ->constrained('drivers','dvr_id')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('model');
            $table->decimal('rentalPrice');
            $table->string('brand');
            $table->string('color')->nullable();
            $table->enum('transmissionType', ['Automatic','Manual','CVT Transmission']);
            $table->string('amenities')->nullable();
            $table->string('seatCapacity');
            $table->text('desc');
            $table->string('vanImages')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
