<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UzytkownicyPodkategorie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uzytkownicy_podkategorie', function (Blueprint $table) {
            $table->uuid('id_uzytkownika');
            $table->uuid('id_podkategorii');
            $table->primary(['id_uzytkownika', 'id_podkategorii']);
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_usunieto')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uzytkownicy_podkategorie');
    }
}
