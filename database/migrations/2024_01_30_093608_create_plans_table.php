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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->on('players')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('match_id');
            $table->foreign('match_id')->on('matches')->references('id')->onDelete('cascade');
            $table->enum('status',['main','beanch']);
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
        Schema::dropIfExists('plans');
    }
};
