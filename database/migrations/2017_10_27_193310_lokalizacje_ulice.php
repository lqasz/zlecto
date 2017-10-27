<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LokalizacjeUlice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokalizacje_ulice', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('id_lokalizacji');
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_usunieto')->default(false);
            $table->string('ulica');
            $table->string('kod_pocztowy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokalizacje_ulice');
    }
}
