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
        Schema::create('third_party_apis', function (Blueprint $table) {
            $table->id();
            $table->string('apiVendor');
            $table->boolean('mode')->default(false);
            $table->string('appID')->nullable()->unique();
            $table->string('token')->nullable()->unique();
            $table->string('seceratID')->nullable()->unique();
            $table->string("urlScheme")->nullable();
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
        Schema::dropIfExists('third_party_apis');
    }
};
