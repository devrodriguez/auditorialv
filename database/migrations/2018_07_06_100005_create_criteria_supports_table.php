<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriaSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_supports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', 1000);
            $table->unsignedInteger('attach_type_id');
            $table->unsignedInteger('criteria_id');
            $table->timestamps();

            // Foreign
            $table->foreign('attach_type_id')->references('id')->on('attach_types');
            $table->foreign('criteria_id')->references('id')->on('criterias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteria_supports');
    }
}
