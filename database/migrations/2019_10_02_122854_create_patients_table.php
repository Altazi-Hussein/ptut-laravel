<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName', 50);
            $table->string('pathologie', 50)->nullable();
            $table->string('typeDeSoin', 50)->nullable();
            $table->string('adresse', 100)->nullable();
            $table->string('complementAdresse', 50)->nullable();
            $table->integer('telephone')->nullable();
            $table->string('lastName', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
