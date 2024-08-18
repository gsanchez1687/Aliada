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
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->after('name')->nullable();
            $table->string('phone')->after('gender')->nullable();
            $table->date('date_birth')->after('phone')->nullable();
            $table->text('address')->after('date_birth')->nullable();
            $table->string('code_postal')->after('address')->nullable();
            $table->string('image')->after('code_postal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('phone');
            $table->dropColumn('code_postal');
            $table->dropColumn('date_birth');
            $table->dropColumn('address');
            $table->dropColumn('image');
        });
    }
};
