<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Logowania extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logowania', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('id_uzytkownika');
            $table->dateTime('czas_logowania');
            $table->string('adres_ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logowania');
    }
}
