<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_sales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('machine_name');
            $table->timestamps();
        });
        DB::table('status_sales')->insert([
            [
                'name' => 'Reserva en revision',
                'machine_name' => 'reserva_en_revision',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'En carga de documento',
                'machine_name' => 'en_carga_de_documento',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'En revision de documento',
                'machine_name' => 'en_revision_de_documento',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Venta concretada',
                'machine_name' => 'venta_concretada',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_sales');
    }
};
