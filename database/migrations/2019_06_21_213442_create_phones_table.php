<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('phone');

            $table->timestamps();
        });

        Schema::create('phone_real', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('phone_id');
            $table->string('real_id');
            $table->boolean('default')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
        Schema::dropIfExists('phone_real');
    }
}
