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
            $table->increments('criteria_support_id');
            $table->string('content', 1000);
            $table->unsignedInteger('attach_type_id');
            $table->timestamps();

            // Foreign
            $table->foreign('attach_type_id')->references('attach_type_id')->on('attach_types');
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
