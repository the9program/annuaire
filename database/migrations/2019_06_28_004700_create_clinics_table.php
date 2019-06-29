<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->longText('speech')->nullable();
            $table->unsignedBigInteger('visit')->default(false);
            $table->string('number_emergency')->nullable();

            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');

            $table->unsignedBigInteger('creator_id')->index();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('opening_id')->index();
            $table->foreign('opening_id')
                ->references('id')
                ->on('openings');


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
        Schema::dropIfExists('clinics');
    }
}
