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
        Schema::create('taste', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('song_id')->contraint('songs');
            $table->unsignedBigInteger('artist_id')->constraint('artists');
            $table->unsignedBigInteger('user_id')->constraint('users');
            $table->integer('frequency')->default(1);//to count listens/views of user.
            $table->boolean('songLiked')->default(false);
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
        Schema::dropIfExists('taste');
    }
};
