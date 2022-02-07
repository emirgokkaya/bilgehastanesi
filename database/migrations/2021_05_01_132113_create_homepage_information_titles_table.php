<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageInformationTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_information_titles', function (Blueprint $table) {
            $table->id();

            $table->string('top_title')->nullable();
            $table->string('title');
            $table->longText('content');
            $table->string('image');
            $table->string('icon')->nullable();

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
        Schema::dropIfExists('homepage_information_titles');
    }
}
