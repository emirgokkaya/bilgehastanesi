<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativeTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_teams', function (Blueprint $table) {
            $table->id();

            $table->string('degree');
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('role');
            $table->string('profile_photo');
            $table->string('slug');

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
        Schema::dropIfExists('administrative_teams');
    }
}
