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
        Schema::create('vehicle_route', function (Blueprint $table) {
            $table->id();
            $table->string('routeNo')->index();
            $table->string('plateNo')->index();
            $table->decimal('fare');

            $table->foreign('routeNo')
            ->references('routeNo')
            ->on('routes')
            ->onDelete('cascade'); 

            $table->foreign('plateNo')
            ->references('plateNo')
            ->on('vehicles')
            ->onDelete('cascade'); 

            $table->date('departureDate');
            $table->time('departureTime');
            $table->date('returnDate')->nullable();
            // $table->integer('seatsAvailable');
            
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
        Schema::dropIfExists('vehicle_route');
    }
};
