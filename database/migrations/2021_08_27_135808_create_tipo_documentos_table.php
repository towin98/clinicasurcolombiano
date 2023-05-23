<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->string('id_codigo', 20)       ->comment('Codigo documento');
            $table->string('descripcion', 50)  ->comment('Descripcion del Documento');
            $table->timestamps();
            $table->primary("id_codigo");

        });
        DB::statement("ALTER TABLE tipo_documentos comment 'Tipos de Documentos'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_documentos');
    }
}
