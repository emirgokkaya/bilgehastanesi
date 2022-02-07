
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporation', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();

            $table->longText('kvkk')->nullable();
            $table->longText('footer_content')->nullable();
            $table->string('health_policy')->nullable();
            $table->string('international_health_tourism_authorization_certificate')->nullable();
            $table->string('application_form')->nullable();

            $table->text('address')->nullable();
            $table->string('year_of_foundation')->nullable();

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
        Schema::dropIfExists('corporation');
    }
}
