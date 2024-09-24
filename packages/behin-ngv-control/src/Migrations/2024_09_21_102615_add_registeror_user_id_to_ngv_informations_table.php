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
            $table->string('registeror_user_id')->after('unique_id')->nullable();
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
            $table->dropColumn('registeror_user_id');
        });
    }
};
