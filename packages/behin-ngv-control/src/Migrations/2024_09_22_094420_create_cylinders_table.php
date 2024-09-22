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
        Schema::create('behin_part_cylinders', function (Blueprint $table) {
            $table->id();
            $table->string('ngv_info_unique_id');
            $table->string('manufacturer')->nullable();
            $table->string('serial')->nullable();
            $table->string('type')->nullable();
            $table->string('produce_date')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('valve_manufacturer')->nullable();
            $table->string('valve_serial')->nullable();
            $table->string('valve_type')->nullable();
            $table->string('cylinder_image')->nullable();
            $table->string('valve_image')->nullable();

            $table->timestamps();
        });

        Schema::create('behin_part_regulators', function (Blueprint $table) {
            $table->id();
            $table->string('ngv_info_unique_id');
            $table->string('manufacturer')->nullable();
            $table->string('serial')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });

        Schema::create('behin_part_ecus', function (Blueprint $table) {
            $table->id();
            $table->string('ngv_info_unique_id');
            $table->string('manufacturer')->nullable();
            $table->string('serial')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });

        Schema::create('behin_part_filling_valves', function (Blueprint $table) {
            $table->id();
            $table->string('ngv_info_unique_id');
            $table->string('manufacturer')->nullable();
            $table->string('serial')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });

        Schema::create('behin_part_cutoff_valves', function (Blueprint $table) {
            $table->id();
            $table->string('ngv_info_unique_id');
            $table->string('manufacturer')->nullable();
            $table->string('serial')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });

        Schema::create('behin_part_injectors', function (Blueprint $table) {
            $table->id();
            $table->string('ngv_info_unique_id');
            $table->string('manufacturer')->nullable();
            $table->string('serial')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('cylinders');
    }
};
