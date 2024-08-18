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
            $table->string('currency')->nullable();
            $table->integer('half_bathroom')->nullable();
            $table->string('capture')->nullable();
            $table->bigInteger('estimated_monthly_payment')->nullable();
            $table->bigInteger('maintenance_fee')->nullable();  
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
            $table->dropColumn('currency');
            $table->dropColumn('half_bathroom');
            $table->dropColumn('capture');
            $table->dropColumn('estimated_monthly_payment');
            $table->dropColumn('maintenance_fee');
        });
    }
};
