<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosEvidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_evidencias', function (Blueprint $table) {
            $table->increments('id_archivos_evidencia');
            $table->unsignedInteger('id_auditoria_empresa_evidencia');
            $table->string('url_archivo', 255);
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_auditoria_empresa_evidencia')->references('id_auditoria_empresa_evidencia')->on('auditoria_empresa_evidencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_evidencias');
    }
}
