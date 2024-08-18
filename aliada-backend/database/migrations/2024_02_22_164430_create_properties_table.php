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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('type_property_id')->constrained('type_properties');
            $table->bigInteger('price');
            $table->bigInteger('range_price_estimated_1')->nullable();
            $table->bigInteger('range_price_estimated_2')->nullable();
            $table->string('slug');
            $table->integer('square_meters');
            $table->integer('rooms');
            $table->integer('bathroom');
            $table->integer('parking');
            $table->foreignId('state_id')->constrained('states');
            $table->foreignId('municipality_id')->constrained('municipalities');
            $table->text('title');
            $table->text('description');
            $table->integer('views');
            $table->text('coordinates_x')->nullable();
            $table->text('coordinates_y')->nullable();
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
        Schema::dropIfExists('properties');
    }
};
