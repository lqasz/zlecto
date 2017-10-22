<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUzytkowniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uzytkownicy', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_usunieto')->default(false);
            $table->uuid('id_polecenia_uzytkownik');
            $table->boolean('czy_administrator')->default(false);
            $table->uuid('id_lokalizacji');
            $table->uuid('id_kategorii');
            $table->string('nr_telefonu');
            $table->string('email');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('haslo');
            $table->string('login', 15);
            $table->integer('ilosc_zetonow')->default(0);
            $table->enum('status_uzytkownika', ['aktywny', 'uspiony', 'nieaktywny']);
            $table->dateTime('ostatnie_logowanie');
            $table->integer('ilosc_opinii')->default(0);
            $table->integer('ilosc_dodanych_ogloszen')->default(0);
            $table->integer('ilosc_zamknietych_ogloszen')->default(0);
            $table->integer('ilosc_aktywnych_ogloszen')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uzytkownicy');
    }
}
