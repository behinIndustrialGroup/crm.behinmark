<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('continents')){
            Schema::create('continents', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('countries')){
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('continent_id');
                $table->string('name');
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if(!Schema::hasTable('provinces')){
            Schema::create('provinces', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('country_id');
                $table->string('name');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('cities')){
            Schema::create('cities', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('province_id');
                $table->string('name');
                $table->softDeletes();
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
