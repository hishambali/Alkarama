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
        if (!Schema::hasColumn('matches', 'status')) {
            Schema::table('matches', function (Blueprint $table) {
                $table->enum('status', ['live', 'finished', 'not_started'])->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            //
            $table->enum('status', [ 'finished', 'not_started'])->change();

        });
    }
};
