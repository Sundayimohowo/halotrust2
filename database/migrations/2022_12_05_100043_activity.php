<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->date('activity_date');
            $table->string('task_code');
            $table->string('activity_type');
            $table->string('team_code');
            $table->string('contract_code');
            $table->timestamps();
        });

        Schema::create('activity_output', function (Blueprint $table) {
            $table->increments('activity_output_id');
            $table->unsignedInteger('activity_id');
            $table->string('output_type');
            $table->unsignedInteger('output_value');
            $table->timestamps();

            $table->foreign('activity_id')->references('activity_id')->on('activity');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_output');
        Schema::dropIfExists('activity');
    }
};
