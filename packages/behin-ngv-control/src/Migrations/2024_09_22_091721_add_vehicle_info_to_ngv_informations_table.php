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
        Schema::table('ngv_informations', function (Blueprint $table) {
            $table->string('vehicle_manufacturer')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_produce_year')->nullable();
            $table->string('vehicle_plate_state')->nullable();
            $table->string('vehicle_plate_number')->nullable();
            $table->string('vehicle_card_image')->nullable();
            $table->string('vehicle_plaque_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ngv_informations', function (Blueprint $table) {
            //
        });
    }
};
