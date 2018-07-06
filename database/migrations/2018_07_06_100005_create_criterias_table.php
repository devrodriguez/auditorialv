<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterias', function (Blueprint $table) {
            $table->increments('criteria_id');
            $table->unsignedInteger('criteria_support_id');
            $table->unsignedInteger('find_id');
            $table->string('name', 250);
            $table->string('description', 500);
            $table->timestamps();

            // Foreign
            $table->foreign('criteria_support_id')->references('criteria_support_id')->on('criteria_supports');
            $table->foreign('find_id')->references('find_id')->on('finds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criterias');
    }
}
