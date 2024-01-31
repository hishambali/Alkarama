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
        Schema::create('clothes', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string("image");
            $table->unsignedBigInteger("sport_id");
            $table->foreign('sport_id')->references('id')->on("sports")->onDelete('cascade');
            $table->unsignedBigInteger("seasone_id");
            $table->foreign('seasone_id')->references('id')->on("seasones")->onDelete('cascade');
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
        Schema::dropIfExists('clothes');
    }
};
