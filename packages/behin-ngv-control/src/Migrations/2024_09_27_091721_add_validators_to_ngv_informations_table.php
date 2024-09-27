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
            $table->unsignedBigInteger('workshop_id')->nullable();
            $table->unsignedBigInteger('approver_supervisor_user_id')->nullable();
            $table->tinyInteger('supervisor_approval')->default(0);
            $table->unsignedBigInteger('approver_workshop_manager_user_id')->nullable();
            $table->tinyInteger('workshop_manager_approval')->default(0);
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
