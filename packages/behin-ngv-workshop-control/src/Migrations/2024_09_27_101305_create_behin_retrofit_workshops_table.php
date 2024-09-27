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
        Schema::create('behin_retrofit_workshops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('continent_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('workshop_manager_user_id')->nullable();
            $table->unsignedBigInteger('workshop_supervisor_user_id')->nullable();
            $table->text('address')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();

            // $table->softDeletes();
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
        Schema::dropIfExists('ngv_informations');
    }
};
