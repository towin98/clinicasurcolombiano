<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50)                                   ->comment('Nombres');
            $table->string('apellidos', 50)                                 ->comment('Apellidos');
            $table->string('correo', 50)                                    ->comment('Correo electronico');
            $table->string('id_tipo_documento')                             ->comment('Tipo documento');
            $table->string('numero_documento',11)                           ->comment('Numero de Documento');
            $table->string('ciudad', 30)                                    ->comment('Ciudad');
            $table->string('n_telefono',11)                                 ->comment('Numero Telefono');
            $table->date('fecha_nacimiento')                                ->comment('Fecha Nacimiento');
            $table->string('convenio_paciente', 50)                         ->comment('Convenio del Paciente');
            $table->unsignedBigInteger('id_servicios_cita')                 ->comment('Servicio que requiere para la cita');
            $table->string('especialidad', 30)                              ->comment('Especialidad');
            $table->text('observacion')                        ->nullable() ->comment('Observacion');
            $table->string('arc_documento_identidad', 100)     ->nullable() ->comment('Archivo Documento de Identidad');
            $table->string('arc_autorizacion_eps', 100)        ->nullable() ->comment('Archivo autorizacion de EPS');
            $table->string('arc_examen_prequirurgicos', 100)   ->nullable() ->comment('Archivo Examen Prequirurgicos');
            $table->string('arc_examenes_biometricos', 100)    ->nullable() ->comment('Archivo Examenes Biometricos');
            $table->string('arc_consentimiento_informado', 100)->nullable() ->comment('Archivo Consentimiento Informado');
            $table->string('arc_fecha_registro', 100)          ->nullable() ->comment('Archivo Fecha Registro');
            $table->string('arc_orden_medica', 100)            ->nullable() ->comment('Archivo Orden Medica');
            $table->timestamps();

            $table->foreign('id_tipo_documento')->references('id_codigo')->on('tipo_documentos')->onDelete('cascade');
            $table->foreign('id_servicios_cita')->references('id')->on('servicio_citas')->onDelete('cascade');
        });
        DB::statement("ALTER TABLE citas comment 'Citas Agendadas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
