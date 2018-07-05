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
            $table->increments('id_auditoria_empresa_evidencias');
            $table->integer('id_auditoria_empresa');
            $table->integer('id_item_auditoria');
            $table->string('observacion', 500);
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
        Schema::dropIfExists('auditoria_empresa_evidencias');
    }
}
