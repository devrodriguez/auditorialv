<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditoriaEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria_empresas', function (Blueprint $table) {
            $table->increments('id_auditoria_empresas');
            $table->unsignedInteger('id_empresa');
            $table->unsignedInteger('id_auditor');
            $table->dateTime('fecha_auditoria');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_empresa')->references('id')->on('enterprises');
            $table->foreign('id_auditor')->references('id')->on('auditors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditoria_empresas');
    }
}
