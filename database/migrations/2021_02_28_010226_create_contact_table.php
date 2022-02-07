<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();

            $table->text('address');
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('image')->nullable();
            $table->text('map_url')->nullable();
            $table->longText('how_can_i_go')->nullable();

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
        Schema::dropIfExists('contact');
    }
}
