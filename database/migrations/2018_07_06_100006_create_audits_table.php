<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->increments('audit_id');
            $table->unsignedInteger('enterprise_id');
            $table->unsignedInteger('criteria_id');
            $table->unsignedInteger('auditor_id');
            $table->dateTime('audit_date');
            $table->dateTime('schedule_date');
            $table->timestamps();

            // Foreign
            $table->foreign('enterprise_id')->references('enterprise_id')->on('enterprises');
            $table->foreign('criteria_id')->references('criteria_id')->on('criterias');
            $table->foreign('auditor_id')->references('auditor_id')->on('auditors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits');
    }
}
