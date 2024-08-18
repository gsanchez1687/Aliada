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
        Schema::create('user_group_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_leader_id');
            $table->unsignedBigInteger('member_id');
            $table->foreign('group_leader_id')->references('id')->on('users');
            $table->foreign('member_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_group_members');
    }
};
