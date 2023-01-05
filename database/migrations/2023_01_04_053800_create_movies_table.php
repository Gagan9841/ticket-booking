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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->longText('description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('show_id');
            $table->timestamps();
            $table->foreign('category_id')
               ->references('id')
               ->on('categories')
               ->onDelete('CASCADE');
            $table->foreign('show_id')
               ->references('id')
               ->on('shows')
               ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
