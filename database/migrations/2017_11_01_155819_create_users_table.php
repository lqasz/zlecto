<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('id_lokalizacji')->nullable(true);
            $table->uuid('id_portfela');
            $table->uuid('awatar')->nullable(true);
            $table->dateTime('data_dodania')->default(date('Y-m-d H:i:s'));
            $table->dateTime('data_modyfikacji')->default(date('Y-m-d H:i:s'));
            $table->dateTime('data_zmiany_hasla')->default(date('Y-m-d H:i:s'));
            $table->boolean('czy_usunieto')->default(false);
            $table->string('haslo');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('email');
            $table->string('nr_telefonu');
            $table->enum('status_uzytkownika', ['aktywny', 'uspiony', 'nieaktywny'])->default('aktywny');
            $table->dateTime('ostatnie_logowanie')->default(date('Y-m-d H:i:s'));
            $table->integer('ilosc_opinii')->default(0);
            $table->integer('ilosc_dodanych_ogloszen')->default(0);
            $table->integer('ilosc_zamknietych_ogloszen')->default(0);
            $table->integer('ilosc_aktywnych_ogloszen')->default(0);
            $table->boolean('czy_administrator')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
