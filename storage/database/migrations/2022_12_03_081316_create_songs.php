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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('songTitle');
            $table->string('songDetail')->default('No details');
            $table->string('songUrl')->unique();
            $table->string("songGenre")->default("NA");
            $table->string('songCoverPhoto')->nullable();
            $table->string('songVideo')->nullable();
            $table->string('songSpotifyID')->nullable();
            $table->string('songDuration')->default("NA");
            $table->unsignedBigInteger('artist_id')->constraint('artists');
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
        Schema::dropIfExists('songs');
    }
};
