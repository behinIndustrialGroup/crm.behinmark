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
        Schema::create('ngv_informations', function (Blueprint $table) {
            $table->id();
            $table->string('owner_firstname')->nullable();
            $table->string('owner_lastname')->nullable();
            $table->string('owner_nin')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('owner_residence_state')->nullable();
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
