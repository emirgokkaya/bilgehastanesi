<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorHealthCornersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_health_corners', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doctor_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('health_corner_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('doctor_health_corners');
    }
}
