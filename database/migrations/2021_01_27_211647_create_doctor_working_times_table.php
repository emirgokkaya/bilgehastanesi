<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorWorkingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_working_times', function (Blueprint $table) {
            $table->id();


            $table->foreignId('doctor_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('working_times_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unique(['doctor_id', 'working_times_id']);


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
        Schema::dropIfExists('doctor_working_times');
    }
}
