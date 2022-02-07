<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality_policies', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->longText('text')->nullable();
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();

            $table->string('image')->nullable();
            $table->longText('text2')->nullable();
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
        Schema::dropIfExists('quality_policies');
    }
}
