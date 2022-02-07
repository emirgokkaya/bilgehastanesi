<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('degree');   // ünvan
            $table->string('name');     // isim
            $table->string('lastname'); // soyisim
            $table->string('profile_photo'); // profil fotoğrafı -- 270x500
            $table->longText('speciality')->nullable();    // uzmanlık
            $table->longText('education')->nullable();    // eğitim
            $table->longText('certificate')->nullable();
            $table->longText('experience')->nullable();   // deneyim

            $table->string('email')->nullable()->unique(); // email
            $table->longText('biography')->nullable(); // biyografi
            $table->date('date_of_birth')->nullable(); // doğum tarihi
            $table->longText('foreign_language')->nullable(); // yabancı dil

            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();

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
        Schema::dropIfExists('doctors');
    }
}
