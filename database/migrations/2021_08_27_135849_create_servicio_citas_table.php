<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_citas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)   ->comment('Nombre del Servicio que requiere para la cita');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE servicio_citas comment 'Servicio que requiere para la cita'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio_citas');
    }
}
