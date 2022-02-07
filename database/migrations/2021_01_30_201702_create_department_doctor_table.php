<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_doctor', function (Blueprint $table) {
            $table->id();

            $table->foreignId('department_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('doctor_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unique(['doctor_id', 'department_id']);

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
        Schema::dropIfExists('department_doctor');
    }
}
