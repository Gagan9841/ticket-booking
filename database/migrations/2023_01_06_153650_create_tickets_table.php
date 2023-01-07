<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_no');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('show_time');
            $table->text('seat_no');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('movie_id')->references('id')->on('movies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('show_time')->references('id')->on('shows')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('tickets');
    }
};
