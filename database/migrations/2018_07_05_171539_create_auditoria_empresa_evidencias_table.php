<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditoriaEmpresaEvidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_empresa_evidencias', function (Blueprint $table) {
            $table->increments('id_auditoria_empresa_evidencia');
            $table->unsignedInteger('id_auditoria_empresa');
            $table->unsignedInteger('id_item_auditoria');
            $table->string('observacion', 500);
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_item_auditoria')->references('id')->on('item_audits');
            $table->foreign('id_auditoria_empresa')->references('id_auditoria_empresas')->on('auditoria_empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditoria_empresa_evidencias');
    }
}
