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
            $table->string('date')->nullable()->after('registeror_user_id');
            $table->string('vehicle_front_after_conversion')->nullable();
            $table->string('vehicle_back_after_conversion')->nullable();
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
