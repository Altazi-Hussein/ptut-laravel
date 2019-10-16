<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('raison',50);
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->datetime('start_time')->nullable();
            $table->datetime('finish_time')->nullable();
            $table->text('commentaire')->nullable();

            $table->foreign('patient_id')->references('id')->on('patients')->ondelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
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
        Schema::dropIfExists('rdvs');
    }
}
