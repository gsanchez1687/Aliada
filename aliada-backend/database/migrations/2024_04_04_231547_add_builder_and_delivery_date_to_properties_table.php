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
        Schema::table('properties', function (Blueprint $table) {
            $table->string('address')->nullable()->after('municipality_id'); 
            $table->string('builder')->nullable()->after('coordinates_y'); 
            $table->string('date_delivery')->nullable()->after('builder'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('builder');
            $table->dropColumn('date_delivery');
        });
    }
};
