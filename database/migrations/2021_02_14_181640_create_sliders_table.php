<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('span_title')->nullable();
            $table->text('title');
            $table->text('content')->nullable();
            $table->string('button_text1')->nullable();
            $table->string('link1')->nullable();
            $table->string('button_text2')->nullable();
            $table->string('link2')->nullable();
            $table->boolean('display');

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
        Schema::dropIfExists('sliders');
    }
}
