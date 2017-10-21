<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOgloszeniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogloszenia', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_usunieto')->default(false);
            $table->boolean('czy_polecony')->default(false);
            $table->dateTime('data_archiwizacji');
            $table->boolean('czy_zarchiwizowno')->default(false);
            $table->dateTime('data_startu');
            $table->dateTime('data_konca');
            $table->string('nazwa', 50);
            $table->text('opis');
            $table->uuid('autor');
            $table->uuid('id_katagorii');
            $table->uuid('awatar');
            $table->float('cena_wyjsciowa', 8, 2)->default(0)->unsigned();
            $table->uuid('id_lokalizacji');
            $table->string('nr_telefonu');
            $table->string('email');
            $table->integer('licznik')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogloszenia');
    }
}
