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
            Schema::table('properties', function (Blueprint $table) {
                $table->unsignedBigInteger('typology_id')->nullable()->before('created_at');
                $table->foreign('typology_id')->references('id')->on('typologies');
            });
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
            $table->dropForeign(['typology_id']);
            $table->dropColumn('typology_id');
        });
    }
};
