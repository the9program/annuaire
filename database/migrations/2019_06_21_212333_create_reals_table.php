<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reals', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('cin')->nullable()->unique();

            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->boolean('gender')
                ->nullable()
                ->comment('false for women and true for man');
            $table->date('birth')->nullable();

            $table->unsignedBigInteger('user_id')->nullable()->index()->unique();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('reals');
    }
}
