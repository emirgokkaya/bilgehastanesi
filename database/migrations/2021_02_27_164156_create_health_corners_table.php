<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthCornersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_corners', function (Blueprint $table) {
            $table->id();

            $table->text('title');
            $table->longText('content');
            $table->string('image');

            /*$table->foreignId('user_id')->nullable();*/

            $table->text('slug');

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
        Schema::dropIfExists('health_corners');
    }
}
