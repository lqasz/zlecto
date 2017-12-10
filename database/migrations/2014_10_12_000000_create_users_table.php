<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->dateTime('data_zmiany_hasla');
            $table->boolean('czy_usunieto')->default(false);
            $table->string('password');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('email');
            $table->string('nr_telefonu');
            $table->enum('status_uzytkownika', ['aktywny', 'uspiony', 'nieaktywny'])->default('nieaktywny');
            $table->dateTime('ostatnie_logowanie')->nullable(true);
            $table->integer('ilosc_opinii')->default(0);
            $table->integer('ilosc_dodanych_ogloszen')->default(0);
            $table->integer('ilosc_zamknietych_ogloszen')->default(0);
            $table->integer('ilosc_aktywnych_ogloszen')->default(0);
            $table->boolean('czy_administrator')->default(0);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
