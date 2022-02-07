<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_service', function (Blueprint $table) {
            $table->id();

            $table->foreignId('department_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('service_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unique(['department_id', 'service_id']);

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
        Schema::dropIfExists('department_service');
    }
}
